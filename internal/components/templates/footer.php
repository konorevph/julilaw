    </main>
    <footer>
    <a href="/">
            <img src="/img/icons/logo.svg" alt="logo">
            <span>Адвокат</span>
            <span class="extra">Голубкова Юлия</span>
        </a>
        <button>
            <img src="/img/icons/list.svg" alt="menu">
        </button>
        <nav>
            <ul>
                <?php foreach ($links as $link): ?>
                    <li>
                        <a <?= $link["href"] === $current_uri ? "" : 'href = "' . $link["href"] . '"' ?> 
                            class="<?= $link["style"]?><?= $link["href"] === $current_uri ? " active" : "" ?>">
                            <?= $link["text"]?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </footer>
    <?php foreach($scripts as $script): ?>
        <script src="<?= $script ?>"></script>
    <?php endforeach; ?>
</body>
</html>