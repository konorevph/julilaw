<section class="services">
<h3 class="left"><?= $heading_1 ?></h3>
<?php foreach($list as $item): ?>
    <div class="service" onclick="toggleDescription(this)">
    <img class="arrow" src="/img/icons/more.svg" alt="стрелка">
        <h3><?= $item["heading"] ?></h3>
    </div>
    <div class="text">
        <?= $item["text"] ?>
        <a href="<?= $item["href"] ?>" class="fill">Подробнее</a>
    </div>
    <?php endforeach; ?>
</section>
