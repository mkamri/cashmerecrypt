<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wishlist = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wtb/wishlist.json'));
?>
<main>
    <section>
        <h1>
        <a href="/egl">☜</a> my wtb list</h1>
        <p><strong>Current Buying status: No-Buy</strong> (ends April 1, 2024)</p>
        <p>As I rebuild my lolita collection with intentionality, I've decided to only purchase items (or very similar items) from my wishlist moving forward. Please feel free to contact me at <a href="mailto:cashmerecrypt@pm.me">cashmerecrypt@pm.me</a> if you see any of these pieces floating around the internet!</p>
    </section>
    <?php foreach($wishlist as $category => $items): ?>
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

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>