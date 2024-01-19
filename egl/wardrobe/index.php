<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1>
        <a href="/egl">☜</a> my wardrobe</h1>
        <p>In January 2024, I rejoined the lolita fashion community. I had made the hard decision to take a hiatus in 2018, partially for my mental health and partially to become more financially stable. I sold all of my pieces and wasn't sure if or when I would return.</p>
        <p>Although the idea of rebuilding from scratch is daunting, it is also an exciting opportunity to build my wardrobe on a solid foundation purchased with intention.</p>
        <p>Check back often to watch my progress!</p>
    </section>
    <?php foreach($wardrobe as $category => $items): ?>
        <section>
            <h1><?= $category ?></h1>
            <div class="wardrobe-grid">
                <?php foreach($items->pieces as $name => $item): ?>
                    <a href="<?= $item->lolibrary ?>" 
                       class="wardrobe-item"
                       target="_blank">
                        <img src="<?= $item->img ?>"
                             style="aspect-ratio: <?= $item->aspectratio ?? 'auto' ?>">
                        <p><?= $name ?><br><?= $item->brand ?> <?= $item->year ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>