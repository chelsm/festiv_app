<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="">
    <div class="column-responsive column-80 users-section">
        <div class="users form content fromAddPost">
            <h2 class="title-page">Publier un contenu</h2>
            <div class="separator"></div>
            <?= $this->Form->create($post, ['enctype' => 'multipart/form-data'])  ?>
            <fieldset>
                <?php echo $this->Form->control('content', ['label' => 'Ajouter une image', 'type' => 'file', 'class'=>'inputImgPost']);?>
                <div class="img-prev"></div>
                <?php echo $this->Form->control('description', ['label'=>false, 'placeholder'=>'Description', 'class'=>'desc']);?>
            </fieldset>
            <?= $this->Form->button('Publier', ['class'=> 'btnSendData']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
