<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts">
    <div class="column-responsive column-80 posts-container">
        <div class=" view content posts-list">
            <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left fa-arrow-left-back"></i>'), ['controller' => 'Posts','action' => 'index'],['class' => 'superclass', 'escape' => false])?>
            <div class="single-post-view post">
                <figure>
                    <img class="post_picture" src='/webroot/img/posts/<?=($post->content)?>' alt='<?= h($post->content) ?>' width="100%" height="auto">
                </figure>
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
                            <i id ="<?= $post->id ?>" class="fa-solid fa-heart like_trigger post-liked-<?=$post->id?>"></i>
                        <?php else :?>
                            <i id ="<?= $post->id ?>"class="fa-regular fa-heart like_trigger post-notLiked-<?=$post->id?>"></i>
                        <?php endif ?>

                        <?= $this->Html->link(__('<i class="fa-solid fa-comment-dots"></i>'), ['controller' => 'Comments','action' => 'add',  $post->id ],['class' => 'superclass', 'escape' => false])?>
                        <?php if ( $post->user_id == $this->request->getAttribute('identity')->id) :?>
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen"></i>'), ['controller' => 'Posts','action' => 'edit',  $post->id ],['class' => 'superclass', 'escape' => false])?>
                        <?php endif ?> 
                            
                    </div> 
                </div>
                <p class="post_description"><?= $post->description?></p>
               
                <div class="separator"></div>

                <div class="all-comments all-comments-view ">
                <?php if (!empty($post->comments)) : ?>
                    <?php foreach ($post->comments as $comments) : ?>
                        <div class="post post-comm">
                            <div class="user">
                                <div class="users-info-picture mini-users-picture">
                                    <?php if ( $comments->user->has('photo')) :?>
                                        <figure>
                                            <img class="user_picture" src='/webroot/img/profils/<?=($comments->user->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                                        </figure>
                                    <?php else :?>
                                        <figure>
                                            <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                                        </figure>
                                    <?php endif ?>
                                </div> 
                                <?= $this->Html->link(__($comments->user->pseudo), ['controller' => 'Users','action' => 'view',  $comments->user->id],['class' => 'superclass search-title name-user-comm', 'escape' => false])?>
                            </div>
                            <p class="post-descr"><?=$comments->content ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                    <span class="search-title" ><?= __('Aucun commentaire') ?></span>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>
