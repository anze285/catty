<div class="post cursor-pointer" style="max-width: 600px;" onclick="redirectToPost(<?= $post["id"] ?>);">
    <div class="post-header">
        <div class="thread-info">
            <a href="<?= BASE_URL . 'threads/index?thread_id=' . $post['tid'] ?>" class="thread-link">
                <span class="thread-title custom-bold"><?= $post['thread_title'] ?></span>
            </a>
            <span class="posted-by user-text">Posted by <?= $post['catname'] ?></span>
        </div>
    </div>
    <hr>
    <div class="post-content">
        <h3 class="post-title"><?= $post['title'] ?></h3>
        <?php if (!empty($post['photo_url'])) : ?>
        <img src="<?= ASSETS_URL . htmlspecialchars($post['photo_url']) ?>" alt="Post Photo" class="post-photo w-100">
        <?php endif; ?>
        <p class="post-text"><?= $post['text'] ?></p>
    </div>
</div>
<script>
    function redirectToPost(postId) {
        var redirectUrl = "<?= BASE_URL . 'posts/show?id=' ?>" + postId;
        window.location.href = redirectUrl;
    }
</script>