<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<div class="posts index content">
    <!-- <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <!-- <h3><?= __('Posts') ?></h3> -->
    <div class="posts-container">
        <section class="posts-list">
                <?php foreach ($posts as $post): ?>
                    <article class="post">
                        <figure>
                            <img class="post_picture" src='/webroot/img/posts/<?=($post->content)?>' alt='<?= h($post->content) ?>' width="100%" height="auto">
                        </figure>
                        <div class="post_info">
                            <span class="post_pseudo"><?= $post->has('user') ? $this->Html->link($post->user->pseudo, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></span>
                            <p class="post_description"><?= $post->description?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
        </section>
    </div>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div> -->
</div>
