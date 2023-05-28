 <div>
    <?php if (!empty($notice)) : ?>
            <div class="alert alert-danger"><?= $notice ?></div>
    <?php endif; ?>
     <?php foreach ($comments as $comment) :
        include 'view/comments/_comment.php';
     endforeach; ?>
     <form action="<?= BASE_URL . "comment/create" ?>" method="post" class="comment-form">
         <textarea name="comment" placeholder="Leave a comment"></textarea>
         <input type="hidden" name="post_id" value="<?= $post["id"] ?>">
         <button type="submit">Submit</button>
     </form>
 </div>