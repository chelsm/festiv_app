<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="">
    <div class="column-responsive column-80 users-section">
        <div class="users form content">
            <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left fa-arrow-left-back"></i>'), ['controller' => 'Users','action' => 'view',$this->request->getAttribute('identity')->id],['class' => 'superclass', 'escape' => false])?>

            <h2 class="title-page">modifier mon profil</h2>
            <div class="separator"></div>

            <?= $this->Form->create($user) ?>
            <fieldset class="users-edit users-info">
                <div  class="users-info-picture">
                    <a href="/users/picture/<?= $this->request->getAttribute('identity')->id?>">
                    <?php if ( $user->has('photo')) :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/<?=($user->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php else :?>
                        <figure>
                            <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                        </figure>
                    <?php endif ?>
                    </a>
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
                    echo $this->Form->control('password', [
                        "placeholder"=>"password",
                    ])
                    ; 

                ?>
            </fieldset>
            <?= $this->Flash->render() ?>
            <?= $this->Form->button('Sauvegarder', ['class'=> 'btnSendData']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
