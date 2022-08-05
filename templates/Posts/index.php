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
                            <div  class="post_info__action">
                                <!-- <?= $post ?> -->
                                <?php if ( $post->likes) :?>
                                    <?php foreach ($post->likes as $like): ?>
                                        <?php if ( $like->user_id === $this->request->getAttribute('identity')->id ) :?>
                                            <?= $this->Html->link(__('<i class="fa-solid fa-heart post-liked"></i>'), ['controller' => 'Likes','action' => 'delete',  $like->id],['class' => 'superclass', 'escape' => false])?>
                                        <?php else :?>
                                            <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                                        <?php endif ?>

                                    <?php endforeach; ?>
                                <?php else :?>
                                    <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                                <?php endif ?>
                                <?= $this->Html->link(__('<i class="fa-solid fa-comment-dots"></i>'), ['controller' => 'Comments','action' => 'index', ],['class' => 'superclass', 'escape' => false])?>
                            </div> 
                        </div>
                        <p class="post_description"><?= $post->description?></p>

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
