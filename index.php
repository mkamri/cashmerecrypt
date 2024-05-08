<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');

    $statuses = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/statuses.json"), true);
    $statusDate = array_key_first($statuses);
    $status = reset($statuses);

    $diaries = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/diary.json"), true);
    $diaryDate = array_key_first($diaries);
    $diary = reset($diaries);


    $skilltree = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/skilltree.json"), true);
    foreach($skilltree as &$details)
    {
        $details['totalTime'] = 0;
        foreach($details['skills'] as $skillTime)
        {
            $details['totalTime'] += $skillTime;
        }
        $details['percent'] = ($details['totalTime'] / 10000) * 100;
        if($details['percent'] > 100)
        {
            $details['percent'] = 100;
        }

        $details['level'] = $details['percent'] >= 1 
            ? 'level '.number_format($details['percent'])
            : 'tutorial';
    }
?>
<main>
    <section id="welcome">
        <h1>welcome</h1>
        <p>Welcome to <strong>Cashmere Crypt</strong>, my little corner of the internet. This site has been purposefully un-optimized for mobile. Please come back on your PC or enjoy the side-scroll  ˶ᵔ ᵕ ᵔ˶</p>
        <p>I'm an programmer by day, artist by night, and weekender gothic lolita. I love to discuss philosophy, taxonomy, counterculture, art, and the nature of life itself.</p>
        <p>This site is my personal space to share my favorite clothing, thoughts about life, and whatever happens to interest me. Enjoy your stay! ˚ʚ𓉸ྀིɞ˚</p>
    </section>
    <div class="homepage-grid homepage-grid--3">
        <section class="widget widget--short">
            <h2>status</h2>
            <strong><?= time_elapsed_string($statusDate) ?></strong>
            <p><?= $status ?></p>
            <p>⊹°｡⋆༺♱༻⋆｡°⊹</p>
        </section>
        <section class="widget widget--short">
            <h2>diary</h2>
            <p><?= $diary['excerpt'] ?></p>
            <p><a href="/diary">read my diary</a></p>
            <p>⊹°｡⋆༺♱༻⋆｡°⊹</p>
        </section>
        <section class="widget widget--short">
            <h2>link me</h2>
            <a href="https://cashmerecrypt.art"
            target="_blank">
                <img src="/img/buttons/cashmere-crypt-badge.gif"/>
            </a>
            <textarea class="buttonHTML">&lt;a href=&quot;https:&#x2F;&#x2F;cashmerecrypt.art&quot; target=&quot;_blank&quot;&gt;
        &lt;img src=&quot;https:&#x2F;&#x2F;cashmerecrypt.art&#x2F;img&#x2F;buttons&#x2F;cashmere-crypt-badge.gif&quot;&#x2F;&gt;
    &lt;&#x2F;a&gt;</textarea>
        </section>
    </div>
    <div class="homepage-grid homepage-grid--2">
        <section>
            <h2>new coord</h2>
            <a href="/egl/coords">
                <img src="/img/coords/5.jpg" class="homepage-coord-img">
            </a>
            <p>check my <a href="/egl/coords">coords</a>?</p>
            <p>⊹°｡⋆༺♱༻⋆｡°⊹</p>
        </section>
        <section>
            <h2>new item</h2>
            <a href="/egl/wardrobe">
                <img src="/img/wardrobe/main/cornet-striped.PNG" class="homepage-coord-img">
            </a>
            <p>view my <a href="/egl/wardrobe">wardrobe</a>?</p>
            <p>⊹°｡⋆༺♱༻⋆｡°⊹</p>
        </section>
    </div>

    <section id="skilltree">
        <h2>class skills</h2>
        <?php foreach($skilltree as $ability => $info): ?>
            <div class="skilltree--container">
                <div class="skilltree--header">
                    <p><?= $ability ?></p>
                    <p><?= $info['level'] ?></p>
                </div>
                <div class="skilltree--bar">
                    <div class="skilltree--bar-filler"
                         style="--skilltree-percent: <?= $info['percent'] ?>%">
                    </div>
                    <div class="skilltree--bar-text">
                        <?= number_format($info['totalTime']) ?> / 10,000
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <p>1 XP = 1 hour of practice</p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>