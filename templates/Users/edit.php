<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80 users-section">
        <div class="users form content">
            <h2 class="title-page">modifier mon profil</h2>
            <div class="separator"></div>

            <?= $this->Form->create($user) ?>
            <fieldset class="users-edit users-info">
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
                <?php echo $this->Form->control('pseudo', [
                        "placeholder"=>"pseudo"
                        ])
                    ; 
                ?>
                <?php echo $this->Form->control('description', [
                        "placeholder"=>"description",
                        ])
                    ; 
                ?>

                <?php
                    echo $this->Form->control('firstname', [
                        "placeholder"=>"firstname",
                        ])
                    ; 
                    echo $this->Form->control('lastname', [
                        "placeholder"=>"lastname",
                        ])
                    ; 
                    echo $this->Form->control('email', [
                        "placeholder"=>"email",
                    ])
                    ; 

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
