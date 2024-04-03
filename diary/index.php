<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header-plain.php'); 

    $entries = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/data/diary.json'));
?>
<main>
    <section id="diary">
        <h1><a href="/">☜</a> my diary</h1>
        <p>Looks like you've stumbled upon my diary (´ཀ`).𖥔 ݁ ˖ I post whenever and whatever I feel like here, and content warnings will be tagged at the top of each entry.</p>
    </section>
    <?php foreach($entries as $date => $entry): ?>
        <div class="diary-entry">
            <div>
                <section>
                    <img src="<?= $entry->img ?>" class="diary-image">
                    <ul class="diary-info">
                        <li><strong><?= date('m.d.y') ?></strong></li>
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
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer-plain.php'); ?>