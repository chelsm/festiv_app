<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="">
    <div class="">
    <div class="column-responsive column-80 users-section">
        <div class="users form content">
        <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left fa-arrow-left-back"></i>'), ['controller' => 'Posts','action' => 'view',$post->id],['class' => 'superclass', 'escape' => false])?>
        <h2 class="title-page">modifier ma publication</h2>
        <div class="separator"></div>

            <?= $this->Form->create($post) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('description', ['class'=>'desc']);
                ?>
            </fieldset>
            <?= $this->Form->button('Sauvegarder', ['class'=> 'btnSendData']) ?>
           
            <?= $this->Form->end() ?>
            <?= $this->Form->postLink(
                __('Supprimer la publication'),
                ['action' => 'delete', $post->id],
                ['confirm' => __('Es tu sur de vouloir supprimer cette publication', $post->id), 'class' => 'side-nav-item btnDelete']
            ) ?>
        </div>
    </div>
</div>
</div>
