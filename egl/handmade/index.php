<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl">☜</a> handmade by me</h1>
        <p>I've recently fallen in love with sewing my own clothes. I love that I can make items completely customized to my measurements and taste. I can also create pieces in the old school style that I love without engaging in stressful bidding wars~</p>
        <p>I'm excited to share my handmade collection with you here!</p>
    </section>
    <section>
        <h1>my handmade collection</h1>
        <div class="wardrobe-grid">
            <?php foreach($wardrobe as $category => $items): ?>
                <?php foreach($items->pieces as $name => $item): ?>
                    <?php if($item->brand == 'Handmade by Me'): ?>
                    <a href="<?= $item->lolibrary ?>" 
                        class="wardrobe-item">
                            <img src="<?= $item->img ?>"
                                style="aspect-ratio: <?= $item->aspectratio ?? 'auto' ?>">
                            <p><?= $name ?><br><?= $item->brand ?> <?= $item->year ?></p>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <section>
        <h1>resources</h1>
        <ul>
            <li>
                <a href="https://www.youtube.com/@SewBlack"
                   target="_blank">
                    Sew Black Lolita
                </a> - easy-to-follow lolita sewing tutorials, even for a beginner!
            </li>
            <li>
                <a href="http://www.fyeahlolita.com/p/lolita-tutorials.html"
                   target="_blank">
                    Lolita Tutorials / F Yeah Lolita
                </a> - huge list of DIY tutorials
            </li>
            
        </ul>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>