<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message[]|\Cake\Collection\CollectionInterface $messages
 */
?>


<div class=" index content messages-section">
    <!-- <?= $this->Html->link(__('New Message'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h2 class="title-page">discussions</h2>
    <div class="separator"></div>

    <div class="messages">
        <ul>
            <?php foreach ($list2 as $li): ?>
                <td><?= ($li) ?></td>
                <?php ($li->sender_id === $this->request->getAttribute('identity')->id ? $msg = $li->receiver : $msg = $li->sender) ?>
                <!-- <td><?= ($msg) ?></td> -->
                
                <li>
                    <a href='/messages/add/<?= $msg->id?>'>
                        <div class="users-info-picture mini-users-picture">
                            <?php if ( $msg->has('photo')) :?>
                                <figure>
                                    <img class="user_picture" src='/webroot/img/profils/<?=($msg->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                                </figure>
                            <?php else :?>
                                <figure>
                                    <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                                </figure>
                            <?php endif ?>
                        </div>
                        <span class="search-title"><?=$msg->pseudo ?></span>
                    </a>
                </li>
                <div class='line'></div>
            <?php endforeach; ?>
            </ul>
    </div>
</div>
