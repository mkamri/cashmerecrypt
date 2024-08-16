<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');

    $statuses = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/statuses.json"), true);
    $statusDate = array_key_first($statuses);
    $status = reset($statuses);

    $diaries = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/diary.json"), true);
    $diaryDate = array_key_first($diaries);
    $diary = reset($diaries);


    $activity = getGuildActivity();
    $posts = getPosts();

    $member = $activity[1];
?>
<main>
    <section id="welcome">
        <h1>welcome</h1>
        <p>Welcome to <strong>Cashmere Crypt</strong>, my little corner of the internet. I'm currently in the process of reorganizing, please pardon the mess  ˶ᵔ ᵕ ᵔ˶</p>
    </section>
    <?php foreach($posts as $post): ?>
        <section>
            <h1><?= $post['Title'] ?></h1>
            <?php if(!empty($post['Image'])): ?>
                <img src="/img/posts/<?= $post['Image'] ?>"
                        class="post--img"/>
            <?php endif; ?>
            <?= $Parsedown->text($post['Content']) ?>
            <p><strong><?= date('n.j.Y', strtotime($post['CreatedOn'])) ?></strong></p>
        </section>
    <?php endforeach; ?>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>