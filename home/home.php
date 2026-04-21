<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="./style.css" rel="stylesheet">
</head>
    <body class="clear-border-in-body">
    <div class="main-container">

        <nav class="sidebar-field">
            <?php foreach ($menu as $item): ?>
                <div class="navigation">
                    <a href="<?= $item['link'] ?>">
                        <img src="<?= $item['button'] ?>" class="smart-button" width="40" height="40" alt="<?= $item['alt'] ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </nav>

        <div class="column-fild">
            <div class="lenta-field">
                <div class="post-field">

                    <?php foreach ($posts as $post): ?>
                        <?php include __DIR__ . '/post_preview.php'; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    </body>
</html>
