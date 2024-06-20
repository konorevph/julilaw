<section class="prices">
    <h3 class="left"><?= $heading ?></h3>
    <ul>
        <?php foreach($list as $item): ?>
            <li><span><?= $item["service"] ?></span><?= $item["price"] ?></li>
        <?php endforeach; ?>
    </ul>

</section>