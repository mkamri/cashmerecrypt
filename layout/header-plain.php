<?php
    include($_SERVER["DOCUMENT_ROOT"].'/lib/Parsedown.php');
    include($_SERVER["DOCUMENT_ROOT"].'/functions.php');
    $Parsedown = new Parsedown();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css?t=54">
    <link rel="icon" href="/img/favicon.gif" type="image/gif" />
    <link rel="author" href="/humans.txt" />
    <script type="text/javascript" src="/script.js"></script>
    <title>ℭashmere ℭrypt</title>
</head>
<body>
    <header>
        <a href="/">
            <h1>Cashmere Crypt</h1>
        </a>
        <button id="hamburger--btn">
            <img src="/img/assets/hamburger.png" id="hamburger--img">
        </button>
    </header>
    <div id="hamburger--container">
        <?php include('nav.php') ?>
    </div>


    <script>
        const hamburgerBtn = document.querySelector('#hamburger--btn');
        const hamburgerContainer = document.querySelector('#hamburger--container');
        const hamburgerImg = document.querySelector('#hamburger--img');

        hamburgerBtn.addEventListener('click', () => {
            hamburgerContainer.classList.toggle('visible');

            let btnSRC = hamburgerContainer.classList.contains('visible')
                ? '/img/assets/x.png'
                : '/img/assets/hamburger.png';

            hamburgerImg.src = btnSRC;

        });
    </script>