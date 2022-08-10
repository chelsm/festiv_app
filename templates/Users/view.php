<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="">
    <div class="column-responsive column-80 users-section">
        <div class="users view content users-view">
            <?php if ($user->id == $this->request->getAttribute('identity')->id) :?>
                <?= $this->Html->link('<i class="fa-solid fa-circle-xmark"></i>',['controller' => 'Users','action' => 'logout'],['class' => 'superclass logout', 'escape' => false]) ?>
            <?php endif ?>
            <div  class="users-info">
                <div  class="users-info-picture">
                    <?php if ( $user->has('photo')) :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/<?=($user->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php else :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php endif ?>
                </div>
                <div  class="users-info-name">
                    <h2 class="users-pseudo"><?= h($user->pseudo) ?></h2>
                    <?php if ($user->id == $this->request->getAttribute('identity')->id) :?>
                       <?= $this->Html->link('<i class="fa-solid fa-user-pen"></i>', ['controller'=>'Users','action'=>'edit',$this->request->getAttribute('identity')->id ],['class' => 'superclass', 'escape' => false]) ?>
                    <?php endif ?>
                </div>
                <p class="users-info-description">
                    <?= h($user->description); ?>
                </p>
            </div>
            <div  class="users-info-perso">
                <span>
                    <?= h(count($user->posts)) ?>
                    publications
                </span>
                <span>
                    <?php if ($user->festival == 1 ) : ?>
                        Gérant d'un festival
                    <?php else :?>
                        Festivalier
                    <?php endif ?>
                </span>
            </div>

            <div class="separator"></div>

            <div  class="users-posts">
                <?php if (!empty($user->posts)) : ?>
                    <ul>
                    <?php foreach ($user->posts as $posts) : ?>
                        <li>
                            <?= $this->Html->link(__("
                                <figure>
                                    <img class='user_post' src='/webroot/img/posts/$posts->content' alt='post de utilisateur' width='100%' height='100%'>
                                </figure>
                            "), ['controller' => 'Posts', 'action' => 'view', $posts->id],['class' => 'superclass', 'escape' => false]) ?>
                        </li>
                    <?php endforeach; ?>
                <?php else :?>
                    <span class="search-title"><?=$user->pseudo ?> n'a encore publié aucun contenu</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
