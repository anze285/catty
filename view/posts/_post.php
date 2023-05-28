<div class="post cursor-pointer" style="max-width: 600px;" onclick="redirectToPost(<?= $post["id"] ?>);">
    <div class="post-header">
        <div class="thread-info d-flex justify-content-space-between">
            <div>
                <a href="<?= BASE_URL . 'threads/index?thread_id=' . $post['tid'] ?>">
                <span class="thread-title custom-bold"><?= $post['thread_title'] ?></span>
            </a>
                <span class="posted-by user-text">Posted by 
                    <a href="<?= BASE_URL . 'threads/index?user_id=' . $post['uid'] ?>">
                        <?= $post['catname'] ?>
                    </a>
                </span>
            </div>
            <div>
                <?php if ($_SESSION["user"]["id"] === $post['uid']) : ?>
                    <a href="<?= BASE_URL . 'posts/edit?id=' . $post['id'] ?>" class="btn btn-dark">
                        Edit
                    </a>
                <?php endif; ?>
            </div>
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