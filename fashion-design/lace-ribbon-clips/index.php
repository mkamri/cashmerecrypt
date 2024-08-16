<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> lace ribbon hair clips (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/accessories/headwear/hair-clips-bw.png"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>005</strong>
            </li>
            <li>
                Material - <strong>cotton & polyester</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>These ribbon hair clips feature three different kinds of lace to a layered effect. Wear by themselves for a casual look or layered with other hair pieces to create an OTT hairstyle.</p>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>