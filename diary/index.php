<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    $Parsedown = new Parsedown();

    $entries = json_decode(file_get_contents('diary.json'));
?>
<div class="grid container">
    <div class="bg-crypt padding">
        <h1><a href="/" class="text-pictochat">☜</a> my diary</h1>
        <p>Looks like you've stumbled upon my diary (´ཀ`).𖥔 ݁ ˖ I post whenever and whatever I feel like here, and content warnings will be tagged at the top of each entry.</p>
    </div>
    <?php foreach($entries as $date => $entry): ?>
        <div class="bg-crypt padding flex">
            <div class="mr">
                <section>
                    <img src="<?= $entry->img ?>" class="diary-image">
                    <ul class="diary-info">
                        <li><strong><?= date('m.d.y', strtotime($date)) ?></strong></li>
                        <li>⊹°｡⋆༺♱༻⋆｡°⊹</li>
                        <li><strong>mood:</strong> <?= $entry->mood ?></li>
                        <li><strong>weather:</strong> <?= $entry->weather ?></li>
                        <li><strong>music:</strong> <?= $entry->music ?></li>
                        <li><strong>currently:</strong> <?= $entry->currently ?></li>
                        <li>⊹°｡⋆༺♱༻⋆｡°⊹</li>
                    </ul>
                </section>
            </div>
            <section>
                <div class="diary-content">
                    <?= $Parsedown->text(file_get_contents($date.'.md')) ?>
                    <p class="diary-signature">
                        ༒•mika•༒
                    </p>
                </div>
            </section>
        </div>
    <?php endforeach; ?>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer-plain.php'); ?>