<section class="reviews">
    <?php foreach($list as $item): ?>
        <div>
            <h4><?= $item["name"] ?></h4>
            <ul>
                <li><img src="<?= $item["1"] ?>" alt="звезда"></li>
                <li><img src="<?= $item["2"] ?>" alt="звезда"></li>
                <li><img src="<?= $item["3"] ?>" alt="звезда"></li>
                <li><img src="<?= $item["4"] ?>" alt="звезда"></li>
                <li><img src="<?= $item["5"] ?>" alt="звезда"></li>
            </ul>
        </div>
        <p class="orange"><?= $item["day"] ?></p>
        <p><?= $item["reviews"] ?></p>
    <?php endforeach; ?>
</section>
