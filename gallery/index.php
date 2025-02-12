<?php 
    $pageTitle = 'art gallery | cashmere crypt';
    include($_SERVER["DOCUMENT_ROOT"].'/layout/header.php'); 

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
<div class="container">
    <h2 class="text-lg">ART GALLERY</h2>
    <?php foreach($artworks as $year => $works): ?>
        <div>
            <h3><?= $year ?> works</h3>
            <div class="artwork-grid padding bg-crypt">
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
        </div>
    <?php endforeach; ?>
</div>



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
                                <?php if(in_array($info->id + 1, $ids)): ?>
                                    onclick="showSlide(<?= $info->id + 1 ?>)"
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
                                <?php if(in_array($info->id - 1, $ids)): ?>
                                    onclick="showSlide(<?= $info->id - 1 ?>)"
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


<?php include($_SERVER["DOCUMENT_ROOT"].'/layout/footer.php'); ?>