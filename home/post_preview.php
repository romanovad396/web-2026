<?php
$id = (int)($post['id'] ?? 0);
$avatar = htmlspecialchars((string)($post['avatar'] ?? ''), ENT_QUOTES, 'UTF-8');
$author = htmlspecialchars((string)($post['author'] ?? ''), ENT_QUOTES, 'UTF-8');
$photo = htmlspecialchars((string)($post['photo'] ?? ''), ENT_QUOTES, 'UTF-8');
$likes = (int)($post['likes'] ?? 0);
$comment = htmlspecialchars((string)($post['comment'] ?? ''), ENT_QUOTES, 'UTF-8');
$createdAt = htmlspecialchars((string)($post['created_at'] ?? ''), ENT_QUOTES, 'UTF-8');

$postUrl = '/home/post.php?id=' . $id;
?>
<div class="post-field">
    <div class="user">
        <div class="avatar-name-field">
            <img src="<?= $post['avatar'] ?>" class="avatar" width="32" height="32" alt="<?= $post['author'] ?>">
            <div class="user-name-field">
                <span class="user-name"><?= $post['author'] ?></span>
            </div>
        </div>
    </div>
    <div class="photo-field">
        <a href="post.php?id=<?= $post['id'] ?>">
            <img src="<?= $post['photo'] ?>" class="lenta-photo" width="474" height="474" alt="Photo">
        </a>
    </div>
    <div class="like-field">
        <div class="like-image-field">
            <img src="image/image258.png" class="like-size" width="16" height="16" alt="Like">
        </div>
        <div class="like-count-field">
            <span class="like-count"><?= $post['likes'] ?></span>
        </div>
    </div>
    <?php if ($post['comment'] !== ''): ?>
        <div class="comment-field">
            <span class="like-count"><?= $post['comment'] ?></span>
        </div>
    <?php endif; ?>
    <span class="time"><?= $post['created_at'] ?></span>
</div>
