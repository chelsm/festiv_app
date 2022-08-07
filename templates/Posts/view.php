<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts">
    <div class="column-responsive column-80 posts-container">
        <div class=" view content posts-list">
            <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left fa-arrow-left-back"></i>'), ['controller' => 'Posts','action' => 'index'],['class' => 'superclass', 'escape' => false])?>
            <div class="single-post-view post">
                <figure>
                    <img class="post_picture" src='/webroot/img/posts/<?=($post->content)?>' alt='<?= h($post->content) ?>' width="100%" height="auto">
                </figure>
                <div class="post_info">
                    <span class="post_pseudo"><?= $post->has('user') ? $this->Html->link($post->user->pseudo, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></span>
                    <div  class="post_info__action">
                        <?php $nbcoeur = 0 ?>
                        <?php if ( $post->likes) :?>
                            <?php 
                                $coeur = false ;
                                $nbcoeur = count( $post->likes)
                            ?>
                            <?php foreach ($post->likes as $like): ?>
                                <?php if ( $like->user_id === $this->request->getAttribute('identity')->id ) :?>
                                    <?php $coeur = true ?>
                                    <?= $nbcoeur ?>
                                    <?= $this->Html->link(__('<i class="fa-solid fa-heart post-liked"></i>'), ['controller' => 'Likes','action' => 'delete',  $like->id],['class' => 'superclass', 'escape' => false])?>
                                <?php endif ?>
                            <?php endforeach; ?>
                            <?php if ( $like->user_id !== $this->request->getAttribute('identity')->id && $coeur === false) :?>
                                <?= $nbcoeur ?>
                                <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                            <?php endif ?>
                        <?php else :?>
                            <?= $nbcoeur ?>
                            <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                        <?php endif ?>
                        <?= $this->Html->link(__('<i class="fa-solid fa-comment-dots"></i>'), ['controller' => 'Comments','action' => 'add',  $post->id ],['class' => 'superclass', 'escape' => false])?>
                        <?php if ( $post->user_id == $this->request->getAttribute('identity')->id) :?>
                            <?= $this->Html->link(__('<i class="fa-solid fa-pen"></i>'), ['controller' => 'Posts','action' => 'edit',  $post->id ],['class' => 'superclass', 'escape' => false])?>
                        <?php endif ?>
                            
                    </div> 
                </div>
                <p class="post_description"><?= $post->description?></p>
               
                <div class="separator"></div>

                <div class="all-comments all-comments-view ">
                <?php if (!empty($post->comments)) : ?>
                    <?php foreach ($post->comments as $comments) : ?>
                        <div class="post post-comm">
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

                <!-- <div class="related">
                <?php if (!empty($post->comments)) : ?>
                    
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
                            <?php foreach ($post->comments as $comments) : ?>
                            <tr>
                                <td><?= h($comments->id) ?></td>
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
                <?php else :?>
                    <span class="search-title"><?= __('Aucun commentaire') ?></span>
                <?php endif; ?>
            </div> -->
                <!-- <h3><?= h($post->id) ?></h3>
                <h3 style="color: red;"><?= h($post) ?></h3> -->
                <!-- <table>
                    <tr>
                        <th><?= __('Content') ?></th>
                        <td><?= h($post->content) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $post->has('user') ? $this->Html->link($post->user->id, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($post->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($post->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($post->modified) ?></td>
                    </tr>
                </table> -->
                <!-- <div class="text">
                    <strong><?= __('Description') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($post->description)); ?>
                    </blockquote>
                </div> -->
            </div>



            


            <!-- <div class="related">
                <h4><?= __('Related Likes') ?></h4>
                <?php if (!empty($post->likes)) : ?>
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
                        <?php foreach ($post->likes as $likes) : ?>
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
        </div>
    </div>
</div>
