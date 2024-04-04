<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 
    $posts = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"].'/garden/posts.json'));
?>
<main>
    <section>
        <h1>my collection</h1>
        <div id="egl-collection--nav">
            <div>
                <a href="/egl/handmade">
                    <img src="/img/assets/handmade--btn.png"
                         class="egl-collection--nav-img"
                         />
                </a>

            </div>
            <div>
                <a href="/egl/wardrobe">
                    <img src="/img/assets/wardrobe--btn.png"
                         class="egl-collection--nav-img"
                         />
                </a>
            </div>
            <div>
                <a href="/egl/wtb">
                    <img src="/img/assets/wtb--btn.png"
                         class="egl-collection--nav-img"
                         />
                </a>
            </div>
            <div>
                <a href="/egl/coords">
                    <img src="/img/assets/coords--btn.png"
                         class="egl-collection--nav-img"
                         />
                </a>
            </div>
        </div>
    </section>
    <article>
        <h1>about egl fashion</h1>
        <p>Elegant Gothic Lolita is a fashion style that originated in Japan in the early 1990s. It is highly feminine, has a distinct and modest silhouette, and is generally made from high-quality materials. <a href="http://www.fyeahlolita.com/p/what-is-lolita.html" target="_blank">Click here</a> to learn more about the fashion.</p>
        <h1>who is lolita for?</h1>
        <p>Anyone can be a lolita, regardless of race, gender, body type, physical ability, or sexual orientation. Although there is a monetary investment to get started, there are now many quality brands that offer beautiful pieces at a lower price than in years past.</p>
        <h1>what does it <i>mean</i>?</h1>
        <p>The meaning of lolita differs from person to person. For some, it is simply a fashion statement. For me, it is a way to express my feminity in a way that is just for myself.</p>
        <p>I love to immerse myself in a beautiful, soft, lacy world. I am also a member of the slow fashion movement, and I appreciate any brand that produces high-quality clothing intended to last for years to come.</p>
        <h1>obligatory statement</h1>
        <p>Despite its name, Elegant Gothic Lolita holds no relation to the Russian novel or any related proclivities.</p>
    </article>
    <section>
        <h1>my lolita posts</h1>
        <ul>
            <?php foreach($posts as $slug => $post): ?>
                <?php if($post->type == 'lolita'): ?>
                    <li>
                        <a href="/garden/<?= $slug ?>">
                            <?= $post->title ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>
    <section>
        <h1>further reading</h1>
        <ul>
            <li>
                <a href="http://www.fyeahlolita.com/p/what-is-lolita.html"
                   target="_blank">
                    F Yeah Lolita - What Is Lolita?
                </a>
            </li>
            <li>
                <a href="https://docs.google.com/presentation/d/1Q-IYyg5-xftuXfVopqWnfvrGX1EJMH_WZj7vyj3oDBA/edit#slide=id.p"
                   target="_blank">
                    Purest Maiden's Guide to Old-School Lolita
                </a>
            </li>
            <li>
                <a href="https://lolibrary.org/"
                   target="_blank">
                    Lolibrary
                </a>
            </li>
            <li>
                <a href="https://docs.google.com/presentation/d/1DoiWtdBNAUC5EWOewEZiSvwL17nJKUez5ILOI9tkajQ/edit#slide=id.g781395e9e7_0_274"
                   target="_blank">
                    Where to Buy
                </a>
            </li>
            <li>
                <a href="https://docs.google.com/document/d/1F8ACK8jOTAlqczFVlvA5f8pPYhRxk67lJNIZ6ycyLsI/edit"
                   target="_blank">
                    Plus-Size Resources
                </a>
            </li>
            <li>
                <a href="http://mintkismet.blogspot.com/2015/08/lolita-posing-101.html?m=1"
                   target="_blank">
                    How to Pose in Lolita
                </a>
            </li>
        </ul>
    </section>
    <section>
        <h1>iceberg reading</h1>
        <ul>
            <li>
                <a href="http://rufflecloud.blogspot.com/2016/12/momokos-wardrobe.html?m=1"
                   target="_blank">
                    Momoko's Wardrobe
                </a>
            </li>
            <li>
                <a href="https://web.archive.org/web/20080919214537/http://hillieras.ld.infoseek.co.jp/gothloli/fuman.html"
                   target="_blank">
                    2001 Japanese Lolitas Complain Translation
                </a>
            </li>
            <li>
                <a href="https://sullensixxpence.blogspot.com/2023/10/forgotten-garden.html"
                   target="_blank">
                    Forgotten Garden Lolita Archives
                </a>
            </li>
        </ul>
    </section>
</main>

<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>