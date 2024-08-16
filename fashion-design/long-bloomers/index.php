<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

    $wardrobe = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/egl/wardrobe/wardrobe.json'));
?>
<main>
    <section>
        <h1><a href="/egl/handmade">☜</a> long bloomers (2024)</h1>
    </section>
    <section>
        <img src="/img/wardrobe/inner/long-bloomers-bw.png"
             style="width: 100%; object-fit: scale-down;">
    </section>
    <section>
        <h1>item info</h1>
        <ul>
            <li>
                Released in - <strong>2024</strong>
            </li>
            <li>
                Item ID - <strong>003</strong>
            </li>
            <li>
                Material - <strong>100% cotton base / 100% cotton lace / 100% polyester ribbon</strong>
            </li>
        </ul>
    </section>
    <section>
        <h1>notes</h1>
        <p>Comfortable for everyday wear, four rows of soft lace detailing layer beautifully with a skirt or dress. Can be paired with a longer JSK for an elegant look, or layered over a short skirt or JSK for a more casual coordinate.</p>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>