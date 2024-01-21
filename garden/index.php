<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    $posts = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/garden/posts.json'));
?>
<main>
    <section id="garden">
        <h1>garden</h1>
        <p>A digital garden with posts about things I found interesting or useful.</p>
    </section>
    <section>
        <h2>posts</h2>
        <ul>
            <?php foreach($posts as $slug => $post): ?>
                <li>
                    <a href="/garden/<?= $slug ?>">
                        <?= $post->title ?>
                    </a> - <?= $post->excerpt ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>