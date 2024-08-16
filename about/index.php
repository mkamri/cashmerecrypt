<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');

    $activity = getGuildActivity();
    $member = $activity[1];
?>
<main>
    <section>
        <h1><a href="/">☜</a> about me</h1>
    </section>
    <div class="homepage-grid homepage-grid--2">
        <section>
            <img src="/img/coords/7.jpg" id="about--img">
        </section>
        <section id="about" class="widget">
            <p>Hi there, I'm Mika. I initially started this website as a space to share things that interest me, such as my love for art and Japanese fashion.</p>
            <p>Recently, I started using this site as an alternative to social media. You can expect to see posts sharing my creative process, art projects, and inspiration.</p>
            <p>When I'm not coding or working on art projects, I'm usually playing tabletop games like Magic: the Gathering or Kingdom Death, baking bread, or attending tea parties. I also love to travel, and take every opportunity I can to visit new places and listen to live music.</p>
            <p><a href="/diary">Read my diary ;)</a></p>
        </section>
    </div>

    <section id="skilltree">
        <h2>class skills</h2>
        
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
        <p>1 XP = 1 hour of practice</p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>