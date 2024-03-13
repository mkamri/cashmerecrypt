<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> shirred skirt (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/main/shirred-skirt.jpeg"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>002</strong>
            </li>
            <li>
                Material - <strong>100% cotton base / 100% cotton lace</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>This simple & cute skirt is made from a lightweight 100% Kona cotton. Perfect for a breezy Spring or Summer day.</p>
        <p>It's minimally decorated with delicate ladder & cluney lace for an oldschool motif.</p>
        <p>A lovely staple piece to coordinate in many different ways! </p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>