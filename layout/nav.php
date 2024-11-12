<nav>
    <a href="/">
        <h1>Cashmere Crypt</h1>
    </a>
    <div>
        <a href="/about" <?= urlContains('about') ? 'class="link-active"' : '' ?>>ABOUT</a>
    </div>
    <div>
        <a href="/fashion" <?= urlContains('fashion') ? 'class="link-active"' : '' ?>>FASHION</a>
    </div>
    <div>
        <a href="/gallery" <?= urlContains('gallery') ? 'class="link-active"' : '' ?>>ART</a>
    </div>
    <div>
        <a href="/blog" <?= urlContains('blog') ? 'class="link-active"' : '' ?>>BLOG</a>
    </div>
    <div>
        <a href="/links" <?= urlContains('links') ? 'class="link-active"' : '' ?>>LINKS</a>
    </div>
    <a href="https://cashmerecrypt.art"
        target="_blank"
        class="desktop-only">
        <img src="/img/buttons/cashmere-crypt-badge.gif"/>
    </a>
</nav>