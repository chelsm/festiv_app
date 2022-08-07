<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class=" index content messages-section">
    <div class="messages">
        <?= $this->Html->link(__($user->pseudo), ['controller' => 'Users','action' => 'view',  $user->id], ['class' => 'title-page'])?>
        <div class="separator"></div>
        <div class="messages-content">
            <?php foreach ($conv as $c): ?>
                <p class='content-message <?php if($c->sender_id === $this->request->getAttribute('identity')->id): ?> right <?php else: ?> left <?php endif; ?>'>
                    <?= $c->content ?>
                </p>
            <?php endforeach; ?>
            </div>

        <div class="">
            <div class="column-responsive column-80">
                <div class="messages form content">
                    <?= $this->Form->create($message) ?>
                    <fieldset>
                        <?php
                            echo $this->Form->control('content', [
                                "placeholder"=>"Ajouter un commentaire ... ",
                                "label"=>false,
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
        </div>
    </div>
</div>
