<?php foreach ($threads as $thread) : ?>
    <div class="thread">
        <?php
            $threadClass = ($threadActive == $thread['id']) ? 'btn btn-warning btn-block mb-1' : 'btn btn-light btn-block mb-1';
        ?>
        <a href="<?= BASE_URL . 'threads/index?thread_id=' . $thread['id'] ?>" class="<?= $threadClass ?>"><?php echo $thread['title']; ?></a>
    </div>
<?php endforeach; ?>
