<?php
    include($_SERVER["DOCUMENT_ROOT"].'/functions.php');

    $activity = getGuildActivity();

    $id = null;
    if(isset($_GET['id']))
    {
        $id = (int) preg_replace('/[^0-9]/', '', $_GET['id']);
    }
    if(!isset($activity[$id]))
    {
        http_response_code(404);
    }

    $member = $activity[$id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guild/guild.css?t=12">
    <link rel="icon" href="/img/favicon.gif" type="image/gif" />
    <link rel="author" href="/humans.txt" />
    <title><?= $member['name'] ?> | 𝔗𝔥𝔢 𝔘𝔫𝔟𝔬𝔲𝔫𝔡 ℭ𝔯𝔢𝔴</title>
</head>
<body>
    <header class="container">
        <p id="nav-branding">
            <a href="/guild">The Unbound Crew</a>
        </p>
        <ul class="nav">
            <li>
                <a href="#members">Members</a>
            </li>
            <li>
                <a href="#news">News</a>
            </li>
            <li>
                <a href="#about">About</a>
            </li>
        </ul>
    </header>
    <div class="container grid member-grid">
        <div>
            <img src="../../<?= $member['profileImg'] ?? 'img/guild/profile/default.jpg' ?>"
                style="width: 100%; aspect-ratio: 1/1; object-fit: scale-down;">
        </div>
        <div>
            <section>
                <h2 class="top-header">Guild Member</h2>
                <h1 id="guild-member-name"><?= $member['name'] ?></h1>
                <p><i>member since <?= date('F j, Y', strtotime($member['joinDate'])) ?></i></p>
            </section>


            <section>
                <div class="skilltree--container">
                    <div class="skilltree--header">
                        <p>Guild Level</p>
                        <p>Level <?= $member['guildLevel']['currentLevel'] ?></p>
                    </div>
                    <div class="skilltree--bar"
                        title="<?= $member['guildLevel']['pointsRemainingToNext'] ?> XP to next level">
                        <div class="skilltree--bar-filler"
                                style="--skilltree-percent: <?= $member['guildLevel']['percentComplete'] ?>%">
                        </div>
                        <div class="skilltree--bar-text">
                            <?= $member['guildLevel']['currentPoints'] ?> / <?= $member['guildLevel']['totalPointsToNext'] ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php if($member['bio']): ?>
                <section>
                    <p class="mb-0"><strong>About</strong></p>
                    <?= $member['bio'] ?>
                </section>
            <?php endif; ?>

            <?php if($member['url']): ?>
                <section>
                    <p><strong>Links</strong></p>
                    <div class="flex-center">
                        <img src="/img/assets/link-icon.png" style="width: 15px; height: 15px;">
                        <a href="<?= $member['url'] ?>" target="_blank"><?= $member['url'] ?></a>
                    </div>
                </section>
            <?php endif; ?>

            <section>
                <h2>Class Skills</h2>
                <hr>
                <?php foreach($member['subclassXP'] as $subclass): ?>
                    <div class="skilltree--container mb-2">
                        <div class="skilltree--header">
                            <p><?= $subclass['class'] ?></p>
                            <p>Level <?= (int)(($subclass['totalXP'] / 1000) < 1 ? 1 : $subclass['totalXP'] / 1000 ) ?></p>
                        </div>
                        <div class="skilltree--bar">
                            <div class="skilltree--bar-filler"
                                    style="--skilltree-percent: <?= (($subclass['totalXP'] > 100000 ? 10000 : ($subclass['totalXP'] / 10)) / 10000) * 100 ?>%">
                            </div>
                            <div class="skilltree--bar-text">
                                <?= number_format($subclass['totalXP'] / 10) ?> / 10,000
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>

    </div>
</body>
</html>