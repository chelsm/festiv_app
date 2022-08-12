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
        <h2 class="title-page">modifier ma photo de profil</h2>
        <div class="separator"></div>

            <?= $this->Form->create($a, ['enctype' => 'multipart/form-data']) ?>
                
            <?= $this->Form->control('image', ['label' => false, 'type' => 'file']) ?>
            <?= $this->Flash->render() ?>

            <?= $this->Form->button('Sauvegarder', ['class'=> 'btnSendData']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



