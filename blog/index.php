<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 
    $Parsedown = new Parsedown();
?>
<main>
    <section id="blog">
        <h1>blog</h1>
        <p>Personal blog with posts about things I found interesting or useful</p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>