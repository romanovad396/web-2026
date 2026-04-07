<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
$posts = [
    [   'id' => 1,
        'avatar' => 'image/avatar(1).png',
        'author' => 'Ваня Денисов',
        'photo' => 'image/photo(1).png',
        'likes' => 203,
        'comment' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
        'created_at' => 'часа назад'
    ],
    [
        'id' => 2,
        'avatar' => 'image/avatar.png',
        'author' => 'Лиза Дёмина',
        'photo' => 'image/photo.png',
        'likes' => 534,
        'comment' => '',
        'created_at' => 'день назад'
    ],
];
?>
<!DOCTYPE html>
<html>
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
                        <?php 
                        require_once __DIR__ . '/data.php';
                        foreach ($posts as $post) {
                          include 'post_preview.php';
                        }
                        ?>
                    </div>
                </div> 
            </div> 
        </div> 
    </body>        
</html>