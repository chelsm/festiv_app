<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $posts
 */
?>
<div class="comments-section">
    <div class="comments form content">
        <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left fa-arrow-left-back"></i>'), ['controller' => 'Posts','action' => 'view', $myPost->id],['class' => 'superclass', 'escape' => false])?>
        <h2 class="title-page">commentaires</h2>
        <div class="separator"></div>
        <div class="post">
            <div class="user">
                <div class="users-info-picture mini-users-picture">
                    <?php if ( $myPost->user->has('photo')) :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/<?=($myPost->user->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php else :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php endif ?>
                </div> 
                <?= $this->Html->link(__($myPost->user->pseudo ), ['controller' => 'Users','action' => 'view',  $myPost->user->id],['class' => 'superclass search-title name-user-comm', 'escape' => false])?>
            </div>
            <p class="post-descr"><?=$myPost->description ?></p>
        </div>
        <div class='line'></div>


        <div class="all-comments">
                <?php if (!empty($myPost->comments)) : ?>
                    <?php foreach ($myPost->comments as $comments) : ?>
                        <div class="post">
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


        <?= $this->Form->create($comment) ?>
        <fieldset>
            <?php
                echo $this->Form->control('content', [
                    "placeholder"=>"Ajouter un commentaire ... ",
                    "label"=>false,
                    "class"=>"add-comments-section"
                    ])
                ;
            ?>
        </fieldset>
        <button type="submit">
            <i class="fa-solid fa-heart fa-paper-plane" ></i>
        </button>
        <?= $this->Form->end() ?>
    </div>
</div>
