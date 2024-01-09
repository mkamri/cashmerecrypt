<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    // Get the content
    $artworks  = json_decode(file_get_contents('art.json'));

?>
<main>
    <section id="art">
        <h1>My Art</h1>
    </section>
    <?php foreach($artworks as $year => $works): ?>
        <section>
            <h1><?= $year ?></h1>
            <div class="artwork-grid">
                <?php foreach($works as $file => $info): ?>
                    <img class="artwork-thumb"
                         src="/img/art/<?= $year ?>/thumbs/<?= $file ?>"
                         alt="<?= $info->alt ?>">
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>