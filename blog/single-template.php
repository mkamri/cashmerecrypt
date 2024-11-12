<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    $Parsedown = new Parsedown();

    // Get the slug associated with the post
    $slugs = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $slug = $slugs[2];

    // Get the content & metadata
    $content  = file_get_contents('content.md');
    $posts    = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/blog/posts.json'));
    $postData = $posts->{$slug};

?>
<div class="container bg-crypt padding">
    <section id="data">
        <h1><a href="/blog">☜</a> <?= $postData->title ?></h1>
        <ul>
            <?php if(isset($postData->updatedOn) && $postData->updatedOn): ?>
                <li>
                    <strong>last updated:</strong> 
                    <?= date('m/d/Y', strtotime($postData->updatedOn)) ?>
                </li>
            <?php endif; ?>
            <li>
                <strong>posted on:</strong> 
                <?= date('m/d/Y', strtotime($postData->plantedOn)) ?>
            </li>
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
</div>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>