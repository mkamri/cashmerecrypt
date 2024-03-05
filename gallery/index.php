<?php 
    include($_SERVER["DOCUMENT_ROOT"].'/header.html'); 

    // Get the content
    $artworks  = json_decode(file_get_contents('art.json'));
    $ids = [];
    foreach($artworks as $year)
    {
        foreach($year as $art)
        {
            $ids[] = $art->id;
        }
    }

?>
<main>
    <section id="art">
        <h1>My Art</h1>
        <p>This is a little gallery of artwork that I have made. I love to create art with a gothic or fantasy theme.</p>
        <p>Click on a thumbnail to view the full work!</p>
    </section>
    <?php foreach($artworks as $year => $works): ?>
        <section>
            <h1><?= $year ?></h1>
            <div class="artwork-grid">
                <?php foreach($works as $file => $info): ?>
                    <button class="open-button"
                            data-id="<?= $info->id ?>"
                            onclick=" showSlide(this.dataset.id);"
                            >
                        <img class="artwork-thumb"
                             src="/img/art/<?= $year ?>/thumbs/<?= $file ?>"
                             alt="<?= $info->alt ?>"
                             />
                    </button>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>
<dialog id="art-gallery">
    <div class="modal-inner">

        <div class="modal-header">
            <h1>Gallery</h1>
            <button class="close-button">close gallery</button>
        </div>
        <?php foreach($artworks as $year => $works): ?>
            <?php foreach($works as $file => $info): ?>
                <div id="artwork-<?= $info->id ?>"
                    class="gallery-slide">
                    <img class="artwork-gallery"
                        src="/img/art/<?= $year ?>/<?= $file ?>"
                        alt="<?= $info->alt ?>"
                        />
                    <div class="gallery-nav">
                        <button 
                                <?php if(in_array($info->id - 1, $ids)): ?>
                                    onclick="showSlide(<?= $info->id - 1 ?>)"
                                <?php else: ?>
                                    disabled="disabled"
                                <?php endif; ?>
                        >
                            ☜ prev
                        </button>
                        <div class="gallery-details">

                            <h2><?= $info->title ?></h2>
                            <p><?= $info->description ?></p>
                        </div>
                        <button 
                                <?php if(in_array($info->id + 1, $ids)): ?>
                                    onclick="showSlide(<?= $info->id + 1 ?>)"
                                <?php else: ?>
                                    disabled="disabled"
                                <?php endif; ?>>
                            next ☞
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</dialog>

<script>
    const modal = document.querySelector('#art-gallery');
    const modalInner = document.querySelector('.modal-inner');
    const openButton = document.querySelector('.open-button');
    const closeButton = document.querySelector('.close-button');

    closeButton.addEventListener('click', () => {
        modal.close();
    });

    // close modal when clicking outside of modal
    modal.addEventListener('click', () => {
        modal.close();
    });

    modalInner.addEventListener('click', (event) => event.stopPropagation());

    function showSlide(id)
    {
        let slides = document.querySelectorAll('.gallery-slide');
        for(i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }

        let thisSlide = document.querySelector('#artwork-'+id);
        thisSlide.style.display = "block";

        modal.showModal();
    }
</script>

<?php include($_SERVER["DOCUMENT_ROOT"].'/nav.html'); ?>
<?php include($_SERVER["DOCUMENT_ROOT"].'/footer.html'); ?>