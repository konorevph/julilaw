<section class="services">
<h2 class="center"><?= $heading_2 ?></h2>
<h3 class="left"><?= $heading_1 ?></h3>
<?php foreach($list as $item): ?>
    <div class="service" onclick="toggleDescription(this)">
    <img class="arrow" src="/img/icons/more.svg" alt="стрелка">
        <h3><?= $item["heading"] ?></h3>
    </div>
    <div class="text">
        <?= $item["text"] ?>
        <a href="<?= $item["href"] ?>" class="fill bold"><?= $item["button"] ?></a>
    </div>
    <?php endforeach; ?>
</section>
