<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    $Parsedown = new Parsedown();

    // Get the slug associated with the post
    $slugs = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $slug = $slugs[2];

    // Get the content & metadata
    $content  = file_get_contents('content.md');
    $posts    = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/garden/posts.json'));
    $postData = $posts->{$slug};

?>
<main>
    <section id="data">
        <h1><a href="/garden">☜</a> <?= $postData->title ?></h1>
        <ul>
            <?php if($postData->updatedOn): ?>
                <li>
                    <strong>last updated:</strong> 
                    <?= date('m/d/Y', strtotime($postData->updatedOn)) ?>
                </li>
            <?php else: ?>
                <li>
                    <strong>planted on:</strong> 
                    <?= date('m/d/Y', strtotime($postData->plantedOn)) ?>
                </li>
            <?php endif; ?>
            <?php if(isset($postData->music) && !empty($postData->music)): ?>
                <li>
                    <strong>listening to:</strong> 
                    <a href="<?= $postData->music->link ?>" target="_blank">
                        <?= $postData->music->name ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <article>
        <?= $Parsedown->text($content) ?>
    </article>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>