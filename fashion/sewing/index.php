<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php');
?>
<div class="grid">
    <div class="flex mb container justify-center">
        <div class="mr">
            <a href="/fashion" 
            class="text-lg text-kuromi">
                COORDS
            </a>
        </div>
        <div class="mr">
            <a href="/fashion/sewing" 
            class="text-lg text-pictochat link-active">
                SEWING
            </a>
        </div>
        <div>
            <a href="/fashion/inspo" 
            class="text-lg text-kuromi">
                INSPO
            </a>
        </div>
    </div>
    <div class="padding bg-crypt container w-full">
        <h2>my collection</h2>
        <p>This is my collection of handmade garments. You can click on a piece to view more info about it.</p>
        <p>I started sewing in high school, mostly altering thrifted pieces. Recently I have started sewing full garments, mostly to wear with lolita coords. It's been a lot of fun!</p>
    </div>
    <div class="grid grid-cols-3 container padding bg-crypt">
        <div class="padding">
            <a href="/fashion/sewing/heart-lace-jsk"
               class="flex flex-col justify-center items-center">
                <img src="/img/wardrobe/main/beginners-heart.PNG"
                     class="scale-down portrait"/>
            </a>
        </div>
        <div>
            <a href="/fashion/sewing/shirred-skirt"
               class="flex flex-col justify-center items-center">
                <img src="/img/wardrobe/main/shirring-skirt.PNG"
                     class="scale-down portrait"/>
            </a>
        </div>
        <div>
            <a href="/fashion/sewing/long-bloomers"
               class="flex flex-col justify-center items-center">
                <img src="/img/wardrobe/inner/long-bloomers-bw.png"
                     class="scale-down portrait"/>
            </a>
        </div>
        <div>
            <a href="/fashion/sewing/ankle-socks"
               class="flex flex-col justify-center items-center">
                <img src="/img/wardrobe/accessories/legwear/ankle-socks-bw.png"
                     class="scale-down portrait"/>
            </a>
        </div>
        <div>
            <a href="/fashion/sewing/lace-ribbon-clips"
               class="flex flex-col justify-center items-center">
                <img src="/img/wardrobe/accessories/headwear/hair-clips-bw.png"
                     class="scale-down portrait"/>
            </a>
        </div>
        <div>
            <a href="/fashion/sewing/daisy-rectangle"
               class="flex flex-col justify-center items-center padding">
                <img src="/img/wardrobe/accessories/headwear/rectangle.png"
                     class="scale-down portrait"/>
            </a>
        </div>
    </div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>