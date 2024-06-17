<section class="why_yes">
    <h2 class="center"><?= $heading ?></h2>
    <ul>
        <?php foreach($list as $item): ?>
            <li>
                <h3 style="background-image: url(<?= $item["img"] ?>)"><?= $item["heading"] ?></h3>
                <p><?= $item["paragraph"] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>