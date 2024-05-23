<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> heart lace jsk (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/main/beginners-heart-1.JPG"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>006</strong>
            </li>
            <li>
                Material - <strong>100% cotton base / 100% cotton lining / 100% cotton lace / polyester ribbon</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>A lovely piece for any season, this 100% cotton twill JSK is fully lined and fully shirred. It features a ribbon tie to adjust the bust size.</p>
        <p>Two types of heart lace adorn the body of the dress for a cute and soft look.</p>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>