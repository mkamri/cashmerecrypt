<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> ankle socks (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/accessories/legwear/ankle-socks-bw.png"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>004</strong>
            </li>
            <li>
                Material - <strong>100% bamboo base / 100% cotton lace / polyester ribbon</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>These socks are made from a luxurious pillow-soft bamboo that stays comfortable and cool. Cotton lace is gathered with a black ribbon for an elevated casual look.</p>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>