<section class="hero_screen">
    <h1><?= $title ?></h1>
    <p><?= $paragraph ?></p>
    <a class="fill bold" href="<?= $link_href ?>"><?= $link_text ?></a>
    <figure>
        <picture>
            <source srcset="<?= $img_src["jpg"]["1x"] ?> 1x,
                <?= $img_src["jpg"]["2x"] ?> 2x,
                <?= $img_src["jpg"]["3x"] ?> 3x"
                type="image/jpg">
            <img src="<?= $img_src["jpg"]["3x"] ?>" alt="<?= $img_alt ?>">
        </picture>
    </figure>
</section>