<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> daisy rectangle headdress (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/accessories/headwear/rectangle-headdress.JPG"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>001</strong>
            </li>
            <li>
                Material - <strong>100% cotton base / cotton & polyester lace</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>This headdress is constructed with two layers of high quality cotton and padded with interfacing for a plush feel.</p>
        <p>It is decorated with three kinds of white lace detailing and black ribbon details to give a layered and interesting look.</p>
        <p>One bow on either side frames the face to create a traditional old school lolita silhouette.</p>
    </section>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>