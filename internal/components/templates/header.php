<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/main.css">

    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?= $style ?>">
    <?php endforeach; ?>

    <title><?= $title ?></title>
</head>
<body>
    <header>
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
    </header>
    <main>