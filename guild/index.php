<?php
    include($_SERVER["DOCUMENT_ROOT"].'/functions.php');

    $guild = getGuildData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guild/guild.css?t=6">
    <link rel="icon" href="/img/favicon.gif" type="image/gif" />
    <link rel="author" href="/humans.txt" />
    <title>𝔗𝔥𝔢 𝔘𝔫𝔟𝔬𝔲𝔫𝔡 ℭ𝔯𝔢𝔴</title>
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
    <div id="hero">
        <img src="/img/guild/hero-img.png" id="hero--img" class="hero--background">
        <img src="/img/guild/hero-mobile.png" id="hero--img-mobile" class="hero--background">
        <div id="hero--content" class="container">
            <h2 class="top-header">Level <?= $guild['levelData']['currentLevel'] ?></h2>
            <h1>Artists Guild</h1>
            <p>"Do what intrigues you, explore what interests you;<br>think mystery, not mastery."</p>
        </div>
    </div>
    <section>
        <div class="container skilltree--container">
            <div class="skilltree--header">
                <p>Guild Level</p>
                <p>Level <?= $guild['levelData']['currentLevel'] ?></p>
            </div>
            <div class="skilltree--bar"
                 title="<?= $guild['levelData']['pointsRemainingToNext'] ?> XP to next level">
                <div class="skilltree--bar-filler"
                        style="--skilltree-percent: <?= $guild['levelData']['percentComplete'] ?>%">
                </div>
                <div class="skilltree--bar-text">
                    <?= $guild['levelData']['currentPoints'] ?> / <?= $guild['levelData']['totalPointsToNext'] ?>
                </div>
            </div>
        </div>
    </section>
    <div class="grid container">
        <div>
            <section id="news">
                <h2 class="top-header">Recent News</h2>
                <h1>Welcome to The Unbound Crew</h1>
                <p>Welcome to the new guild website! This website is still in progress, but check back often to see all the cool stuff we'll be posting.</p>
                <img src="/img/guild/news/stormseeker.jpg"
                     class="photo-scale-down">
            </section>
        </div>
        <div>
            <section id="members">
                <h2 class="top-header">Members</h2>
                <h1>Guild Leaderboard</h1>
                <?php foreach($guild['guildMembers'] as $member): ?>
                    <a href="/guild/member/?id=<?= $member['id'] ?>">
                        <div class="guild-member">
                            <div class="guild-member--profile">
                                <img src="<?= $member['ProfileImg'] ?? '/img/guild/profile/default.jpg' ?>"
                                    class="guild-member--profile-pic"
                                    />
                                <div>
                                    <p><?= $member['Name'] ?></p>
                                    <p class="guild-member--class"><em><?= $member['ClassName'] ?></em></p>
                                </div>
                            </div>
                            <p>Level <?= $member['levelData']['currentLevel'] ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</body>
</html>