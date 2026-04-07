<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
$posts = [
    1 => [
        'id' => 1,
        'title' => 'Зимняя прогулка',
        'author' => 'Ваня Денисов',
        'avatar' => 'image/avatar(1).png',
        'photo' => 'image/photo(1).png',
        'likes' => 203,
        'comment' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
        'created_at' => '2 часа назад'
    ],
    2 => [
        'id' => 2,
        'title' => 'Уют',
        'author' => 'Лиза Дёмина',
        'avatar' => 'image/Avatar.png',
        'photo' => 'image/photo.png',
        'likes' => 534,
        'comment' => '',
        'created_at' => '1 день назад'
    ],
];

$postId = 0;
if (isset($_GET['postId'])) {
    $postId = (int)$_GET['postId'];
} elseif (isset($_GET['id'])) {
    $postId = (int)$_GET['id'];
}

$post = $posts[$postId] ?? null;

// функция экранирования
function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
if ($post === null) {
    http_response_code(404);
    echo '<!doctype html><html><head><meta charset="UTF-8"><title>Пост не найден</title></head><body>';
    echo '<h1>Пост не найден</h1>';
    echo '<p><a href="http://localhost/home/home.php">Вернуться на главную</a></p>';
    echo '</body></html>';
} else {
    $title = e((string)$post['title']);
    $author = e((string)$post['author']);
    $avatar = e((string)$post['avatar']);
    $photo = e((string)$post['photo']);
    $likes = (int)$post['likes'];
    $comment = e((string)$post['comment']);
    $created = e((string)$post['created_at']);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title><?= $title ?></title>
      <link href="./style.css" rel="stylesheet">
    </head>
    <body>
      <h1><?= $title ?></h1>
      <div class="post">
        <div class="author">
          <img src="<?= $avatar ?>" alt="<?= $author ?>" width="32" height="32">
          <strong><?= $author ?></strong>
        </div>
        <div class="photo">
          <img src="<?= $photo ?>" alt="photo" width="400">
        </div>
        <div class="meta">
          <span>Лайков: <?= $likes ?></span> |
          <span><?= $created ?></span>
        </div>
        <?php if ($comment !== ''): ?>
          <div class="comment"><?= $comment ?></div>
        <?php endif; ?>
        <p><a href="http://localhost/home/home.php">← Вернуться на главную</a></p>
      </div>
    </body>
    </html>
    <?php
}
