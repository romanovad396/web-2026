<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
$postId = (int) (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0);
$post = $posts[$postId];

function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$title   = e((string)($post['title'] ?? 'Пост'));
$author  = e((string)($post['author'] ?? ''));
$avatar  = e((string)($post['avatar'] ?? './image/avatar(1).png'));
$photo   = e((string)($post['photo'] ?? './image/photo.png'));
$likes   = (int)($post['likes'] ?? 0);
$comment = e((string)($post['comment'] ?? ''));
$created = e((string)($post['created_at'] ?? ''));

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <link href="./style.css" rel="stylesheet">
    </head>
    <body class="clear-border-in-body">
        <div class="main-container">
            <nav class="sidebar-field">
                <?php if (!empty($menu) && is_array($menu)): ?>
                    <?php foreach ($menu as $item): ?>
                        <div class="navigation">
                            <a href="<?= e((string)($item['link'] ?? '#')) ?>">
                                <img src="<?= e((string)($item['button'] ?? './image/menu.png')) ?>" class="smart-button" width="40" height="40" alt="<?= e((string)($item['alt'] ?? '')) ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="navigation">
                        <img src="./image/menu.png" class="smart-button" width="40" height="40" alt="Home">
                    </div>
                    <div class="navigation">
                        <img src="./image/menuitem(1).png" class="smart-button" width="40" height="40" alt="User">
                    </div>
                    <div class="navigation">
                        <img src="./image/menuitem.png" class="smart-button" width="40" height="40" alt="Menu">
                    </div>
                <?php endif; ?>
            </nav>

            <div class="column-field">
                <div class="lenta-field">
                    <div class="post-field">
                        <div class="user">
                            <div class="avatar-name-field">
                                <img src="<?= $avatar ?>" class="avatar" width="32" height="32" alt="<?= $author ?>">
                                <div class="user-name-field">
                                    <span class="user-name"><?= $author ?></span>
                                </div>

                                <div>
                                    <img src="./image/vector.png" alt="Vector" width="24" height="24" class="vector">
                                </div>
                            </div>
                        </div>

                        <div class="photo-field">
                            <img src="<?= $photo ?>" class="lenta-photo" width="474" height="474" alt="Photo">
                        </div>

                        <div class="like-field">
                            <div class="like-image-field">
                                <img src="./image/image258.png" class="like-size" width="16" height="16" alt="Like">
                            </div>
                            <div class="like-count-field">
                                <span class="like-count"><?= $likes ?></span>
                            </div>
                        </div>

                        <?php if ($comment !== ''): ?>
                            <div class="comment-field">
                                <span class="like-count"><?= $comment ?></span>
                            </div>
                        <?php endif; ?>

                        <span class="time"><?= $created ?></span>

                        <p style="margin-top:12px;"><a href="/home/home.php">← Вернуться на главную</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
