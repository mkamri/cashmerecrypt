<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $posts = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/blog/posts.json'));
?>
<div class="container bg-crypt padding">
    <section id="garden">
        <h1>BLOG POSTS</h1>
    </section>
    <section>
        <ul>
            <?php foreach($posts as $slug => $post): ?>
                <li>
                    <a href="/blog/<?= $slug ?>">
                        <?= $post->title ?>
                    </a> - <?= $post->excerpt ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>