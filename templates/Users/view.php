<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <!-- <aside class="column"> -->
        <!-- <div class="side-nav"> -->
            <!-- <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> -->
        <!-- </div> -->
    <!-- </aside> -->
    <div class="column-responsive column-80 users-section">
        <div class="users view content users-view">

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
                    <?= $this->Html->link('<i class="fa-solid fa-user-pen"></i>', ['controller'=>'Users','action'=>'edit',$this->request->getAttribute('identity')->id ],['class' => 'superclass', 'escape' => false]) ?>
                </div>
                <p class="users-info-description">
                    <?= h($user->description); ?>
                </p>
            </div>

            <div class="separator"></div>

            <div  class="users-posts">
                <?php if (!empty($user->posts)) : ?>
                    <ul>
                    <?php foreach ($user->posts as $posts) : ?>
                        <!-- <figure>
                            <img class="user_post" src='/webroot/img/posts/<?=($posts->content)?>' alt="post de l'utilisateur" width="100%" height="100%">
                        </figure> -->
                        <li>
                            <?= $this->Html->link(__("
                                <figure>
                                    <img class='user_post' src='/webroot/img/posts/$posts->content' alt='post de utilisateur' width='100%' height='100%'>
                                </figure>
                            "), ['controller' => 'Posts', 'action' => 'view', $posts->id],['class' => 'superclass', 'escape' => false]) ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            



            <!-- <table>
                <tr>
                    <th><?= __('Pseudo') ?></th>
                    <td><?= h($user->pseudo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($user->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Festival') ?></th>
                    <td><?= $user->festival ? __('Yes') : __('No'); ?></td>
                </tr>
            </table> -->

            <!-- <div class="related">
                <h4><?= __('Related Comments') ?></h4>
                <?php if (!empty($user->comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->comments as $comments) : ?>
                        <tr>
                            <td><?= h($comments->id) ?></td>
                            <td><?= h($comments->created) ?></td>
                            <td><?= h($comments->modified) ?></td>
                            <td><?= h($comments->content) ?></td>
                            <td><?= h($comments->user_id) ?></td>
                            <td><?= h($comments->post_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div> -->



            <!-- <div class="related">
                <h4><?= __('Related Likes') ?></h4>
                <?php if (!empty($user->likes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Post Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->likes as $likes) : ?>
                        <tr>
                            <td><?= h($likes->id) ?></td>
                            <td><?= h($likes->created) ?></td>
                            <td><?= h($likes->modified) ?></td>
                            <td><?= h($likes->user_id) ?></td>
                            <td><?= h($likes->post_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Likes', 'action' => 'view', $likes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Likes', 'action' => 'edit', $likes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Likes', 'action' => 'delete', $likes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div> -->


            <!-- <div class="related">
                <h4><?= __('Related Posts') ?></h4>
                <?php if (!empty($user->posts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->posts as $posts) : ?>
                        <tr>
                            <td><?= h($posts->id) ?></td>
                            <td><?= h($posts->created) ?></td>
                            <td><?= h($posts->modified) ?></td>
                            <td><?= h($posts->content) ?></td>
                            <td><?= h($posts->description) ?></td>
                            <td><?= h($posts->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div> -->
        </div>
    </div>
</div>
