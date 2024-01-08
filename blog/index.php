<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    $posts = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/blog/posts.json'));
?>
<main>
    <section id="blog">
        <h1>blog</h1>
        <p>A personal blog with posts about things I found interesting or useful.</p>
    </section>
    <section>
        <h2>posts</h2>
        <ul>
            <?php foreach($posts as $slug => $post): ?>
                <li>
                    <strong>
                        <?= date('m/d/Y', strtotime($post->date)) ?> -
                    </strong>
                    <a href="/blog/<?= $slug ?>">
                        <?= $post->title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>