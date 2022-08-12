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
                                <?php 
                                    $nbcoeur = 0 ;
                                    $postIsLiked = false;
                                    if ( $post->likes) {
                                        $nbcoeur = count( $post->likes);
                                        foreach ($post->likes as $like){
                                            if ( $like->user_id === $this->request->getAttribute('identity')->id ) {
                                                $postIsLiked = true;
                                                break;
                                            }
                                            else{
                                                $postIsLiked = false;
                                            }
                                        }
                                    }else{
                                        $postIsLiked = false;
                                    }
                                
                                ?>
                                <span class="nbcoeur-<?= $post->id ?>"><?= $nbcoeur ?></span>
                                <?php if ( $postIsLiked == true) :?>
                                    <i id ="<?= $post->id ?>" class="fa-solid fa-heart unlike_trigger post-liked-<?=$post->id?>"></i>
                                    <!-- <?= $this->Html->link(__('<i class="fa-solid fa-heart post-liked"></i>'), ['controller' => 'Likes','action' => 'delete',  $like->id],['class' => 'superclass', 'escape' => false])?> -->
                                <?php else :?>
                                    <i id ="<?= $post->id ?>"class="fa-regular fa-heart like_trigger post-notLiked-<?=$post->id?>"></i>
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
