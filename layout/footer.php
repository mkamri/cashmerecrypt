<?php
    $updates  = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/data/updates.json"));
?>
            <div id="side-panel">
                <nav>
                    <h1>nav</h1>
                    <ul>
                        <li>
                            <a href="/">home</a>
                        </li>
                        <li>
                            <a href="/gallery">art</a>
                        </li>
                        <li>
                            <a href="/garden">garden</a>
                        </li>
                        <li>
                            <a href="/diary">diary</a>
                        </li>
                        <li>
                            <a href="/egl">egl fashion</a>
                        </li>
                        <li>
                            <a href="/links">links</a>
                        </li>
                    </ul>
                </nav>
                <section id="updates" class="widget">
                    <h1>updates</h1>
                    <?php foreach($updates as $date => $update): ?>
                        <div>
                            <strong>₊⊹ <?= date('M j', strtotime($date)) ?></strong>
                            <?= $Parsedown->text($update) ?>
                        </div>
                    <?php endforeach; ?>
                    <p>( ´ཀ` )</p>
                </section>
            </div>
<?php include('footer-plain.php') ?>