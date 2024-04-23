<?php
include(__DIR__ . "/../config.php");
date_default_timezone_set('America/New_York');
log_server_activity();

// courtesy of 
// https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $then = new DateTime( $datetime );
    $diff = (array) $now->diff( $then );

    $diff['w']  = floor( $diff['d'] / 7 );
    $diff['d'] -= $diff['w'] * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    foreach( $string as $k => & $v )
    {
        if ( $diff[$k] )
        {
            $v = $diff[$k] . ' ' . $v .( $diff[$k] > 1 ? 's' : '' );
        }
        else
        {
            unset( $string[$k] );
        }
    }

    if ( ! $full ) $string = array_slice( $string, 0, 1 );
    return $string ? implode( ', ', $string ) . ' ago' : 'just now';
}

function pdo_connect()
{
    // Create connection
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $port = DB_PORT;
    $charset = DB_CHARSET;

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
    return new \PDO($dsn, $user, $pass, $options);
}
 
function wh_log($log_msg)
{
    $log_filename = __DIR__ . LOG_LOCATION;
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/' . date('m-d-Y') . '.log';

    $log_string = date('H:i:s') . ' | ' . $log_msg . "\n";

    file_put_contents($log_file_data, $log_string, FILE_APPEND);
}

function log_server_activity()
{
    wh_log('someone\'s here...');
    $IPAddress= $_SERVER['REMOTE_ADDR'] ?? null;
    $uri = $_SERVER['REQUEST_URI'] ?? null;
    $userAgent = substr($_SERVER['HTTP_USER_AGENT'], 0, 99) ?? null;
    $createdOn = date('Y-m-d H:i:s');

    // Get IP location
    $IPCountry = null;
    $IPCity = null;
    if($IPAddress && $IPAddress != '127.0.0.1')
    {
        $loc = json_decode(file_get_contents('https://ipapi.co/'.$IPAddress.'/json/?key='.KEY_IPAPI));
        if($loc && !$loc->error)
        {
            $IPCountry = substr($loc->country_name, 0, 99);
            $IPCity = substr($loc->city, 0, 99);
        }
    }

    try
    {
        $pdo = pdo_connect();
        $sql = "INSERT INTO Visitors (IPAddress, UserAgent, URI, IPCountry, IPCity, CreatedOn) VALUES (?,?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$IPAddress, $userAgent, $uri, $IPCountry, $IPCity, $createdOn]);
    }
    catch (Exception $e)
    {
        wh_log($e->getMessage());
    }
}

function getGuildData()
{
    $dashboard = [];

    // GUILD MEMBERS
    try
    {
        $pdo = pdo_connect();
        $sql = "
            SELECT GuildMembers.id,
                    GuildMembers.Name,
                    GuildClasses.Name as ClassName,
                    URL,
                    ProfileImg,
                    SUM(GuildMemberActivityLog.XPEarned) AS XP
            FROM GuildMembers
            INNER JOIN GuildClasses ON GuildClasses.id = GuildMembers.PrimaryClassID
            INNER JOIN GuildMemberActivityLog ON GuildMemberActivityLog.MemberID = GuildMembers.id
            WHERE StatusID = 1
            GROUP BY GuildMembers.Name, GuildClasses.Name, URL, ProfileImg, GuildMembers.id
            ORDER BY XP DESC
        ";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            $guildMember = $row;
            $guildMember['levelData'] = getGuildLevelByXP($guildMember['XP'], true);
            $dashboard['guildMembers'][] = $guildMember;
        };
    }
    catch (Exception $e)
    {
        wh_log($e->getMessage());
    }

    // CURRENT XP
    try
    {
        $pdo = pdo_connect();
        // Find XP earned by challenge
        $sql = "
            SELECT SUM(XPEarned)
            from GuildMemberActivityLog
        ";
        $stmt= $pdo->prepare($sql);
        $stmt->execute();
        $dashboard['currentXP'] = $stmt->fetchColumn();
    }
    catch (Exception $e)
    {
        wh_log($e->getMessage());
    }

    // CURRENT LEVEL
    $dashboard['levelData'] = getGuildLevelByXP($dashboard['currentXP']);

    return $dashboard;
}

function getGuildLevelByXP($guildXP, $isForMember = false)
{
    $modifier = $isForMember ? 10 : 100;

    $currentLevel = number_format(sqrt($guildXP * $modifier) / $modifier);
    $totalPointsToNext = pow((($currentLevel + 1) * $modifier), 2) / $modifier;
    $pointsToNext = $totalPointsToNext - $guildXP;
    $percentComplete = ($pointsToNext / $totalPointsToNext) * $modifier;

    $arr = [
        'currentLevel' => $currentLevel,
        'currentPoints' => $guildXP,
        'pointsRemainingToNext' => $pointsToNext,
        'totalPointsToNext' => $totalPointsToNext,
        'percentComplete' => $percentComplete
    ];

    return $arr;
};