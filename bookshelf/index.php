<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');

    $activity = getGuildActivity();
    $member = $activity[1];
?>
<main>
    <section>
        <h1><a href="/">☜</a> bookshelf</h1>
        <p>A list of books that I am reading / have read that inspire me.</p>
        <p>This page is under construciton ... come back soon to see my books!</p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>