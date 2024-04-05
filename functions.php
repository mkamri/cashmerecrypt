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
        $loc = json_decode(file_get_contents('https://ipapi.co/'.$IPAddress.'/json/'));
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