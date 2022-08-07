<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<div class="posts index content">
    <div class="posts-container">
        <section class="posts-list">
                <?php foreach ($posts as $post): ?>
                    <article class="post">
                        <?= $this->Html->link(__("
                            <figure>
                                <img class='user_post' src='/webroot/img/posts/$post->content' alt='post de utilisateur' width='100%' height='100%'>
                            </figure>
                        "), ['controller' => 'Posts', 'action' => 'view', $post->id],['class' => 'superclass', 'escape' => false]) ?>
                        <div class="post_info">
                            <span class="post_pseudo"><?= $post->has('user') ? $this->Html->link($post->user->pseudo, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></span>
                            <div  class="post_info__action">
                                <?php $nbcoeur = 0 ?>
                                <?php if ( $post->likes) :?>
                                    <?php 
                                        $coeur = false;
                                        $nbcoeur = count( $post->likes)
                                    ?>
                                    <?php foreach ($post->likes as $like): ?>
                                        <?php if ( $like->user_id === $this->request->getAttribute('identity')->id ) :?>
                                            <?php $coeur = true ?>
                                            <?= $nbcoeur ?>
                                            <?= $this->Html->link(__('<i class="fa-solid fa-heart post-liked"></i>'), ['controller' => 'Likes','action' => 'delete',  $like->id],['class' => 'superclass', 'escape' => false])?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    <?php if ( $like->user_id !== $this->request->getAttribute('identity')->id && $coeur === false) :?>
                                        <?= $nbcoeur ?>
                                        <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                                    <?php endif ?>
                                <?php else :?>
                                    <?= $nbcoeur ?>

                                    <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                                <?php endif ?>
                                <?= $this->Html->link(__('<i class="fa-solid fa-comment-dots"></i>'), ['controller' => 'Comments','action' => 'add',  $post->id ],['class' => 'superclass', 'escape' => false])?>
                            </div> 
                        </div>
                        <p class="post_description"><?= $post->description?></p>

                    </article>
                <?php endforeach; ?>
        </section>
    </div>
</div>
