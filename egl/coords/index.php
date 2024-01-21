<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    $Parsedown = new Parsedown();

    // Get the content & metadata
    $c2018  = file_get_contents('2018.md');
    $c2016  = file_get_contents('2016.md');
    $c2024  = file_get_contents('2024.md');

?>
<main>
    <section>
        <h1><a href="/egl">☜</a> coords</h1>
        <p>Here are some coords that I've made over the years. I've done my best to catalog what I wore them for, as well as the brands of the items included in the coord.</p>
        <p>It's been fun to watch my style evolve over the years!</p>
        <p>jump to... <a href="#2024">2024</a> | <a href="#2018">2018</a> | <a href="#2016">2016-17</a></p>
    </section>
    <section id="2024" class="coords">
        <?= $Parsedown->text($c2024) ?>
    </section>
    <section id="2018" class="coords">
        <?= $Parsedown->text($c2018) ?>
    </section>
    <section id="2016" class="coords">
        <?= $Parsedown->text($c2016) ?>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>