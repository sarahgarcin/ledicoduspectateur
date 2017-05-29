<?php snippet('header') ?>
<?php snippet('menu');
function debug($val) {
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
}
?>


    <div>

        <div class="medium-3 small-10" id="content-def">

            <h1><?php echo $page->title()->html() ?></h1>

            <?php if ($image = $page->image()): ?>
                <img src="<?php echo $image->url() ?>" alt="">
            <?php endif ?>

            <p><?php echo html($page->text()->kirbytext()) ?></p>
            <hr>
            <h6><?php echo html($page->citation()->kirbytext()) ?></h6>
            <hr>

            <div id="info-def">
                <ul>
                    <?php foreach ($page->labo()->split() as $tag): ?>
                        <li><strong>Labo :</strong>
                            <a href="<?php echo url('list/' . url::paramsToString(['labo' => str::slug($tag, '-')])) ?>">

                                <?php echo $tag ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>

                <?php foreach ($page->collect()->split() as $collect): ?>
                    <strong>Collecte :</strong> <?php echo html($page->collect()->kirbytext()) ?>
                <?php endforeach ?>

                <ul>
                    <?php foreach ($page->ouverture()->split() as $tag): ?>
                        <li><strong>Ouverture publique:</strong>
                            <a href="<?php echo url('list/' . url::paramsToString(['ouverture' => str::slug($tag, '-')])) ?>">

                                <?php echo $tag ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>

                <ul><strong>Localisation :</strong>
                    <?php foreach ($page->geolocalisation()->split() as $tag): ?>
                        <li>

                            <a href="<?php echo url('list/' . url::paramsToString(['geolocalisation' => str::slug($tag, '-')])) ?>">

                                <?php echo $tag ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>

                <?php echo $page->traduction()->text() ?>

            </div>

        </div>

    </div>


<?php snippet('footer') ?>