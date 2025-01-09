<?php 
    $pageTitle = 'blog | cashmere crypt';
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $postTypes = ['lolita', 'art'];

    $posts = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/blog/posts.json'));
?>
<div class="container bg-crypt padding">
    <div>
        <p>˚₊‧꒰ა ♡ ໒꒱ ‧₊˚</p>
        <h1>BLOG POSTS</h1>
        <p>Some ramblings about things that interest me or lessons I have learned. </p>
    </div>
    <div>
        <?php foreach($postTypes as $postType): ?>
            <p class="mt">˚₊‧꒰ა ♡ ໒꒱ ‧₊˚</p>
            <h2><?= $postType ?></h2>
            <ul>
                <?php foreach($posts as $slug => $post): ?>
                    <?php if($post->type == $postType): ?>
                        <li>
                            <a href="/blog/<?= $slug ?>" class="text-ghost">
                                <?= $post->title ?>
                            </a> - <?= $post->excerpt ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
        <p>˚₊‧꒰ა ♡ ໒꒱ ‧₊˚</p>
    </div>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>