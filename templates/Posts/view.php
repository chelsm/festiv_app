<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row posts">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80 posts-container">
        <div class=" view content posts-list">
            <div class="single-post-view post">
                <figure>
                    <img class="post_picture" src='/webroot/img/posts/<?=($post->content)?>' alt='<?= h($post->content) ?>' width="100%" height="auto">
                </figure>
                <div class="post_info">
                    <span class="post_pseudo"><?= $post->has('user') ? $this->Html->link($post->user->pseudo, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></span>
                    <div  class="post_info__action">
                        <!-- <?= $post ?> -->
                        <?php if ( $post->likes) :?>
                            <?php foreach ($post->likes as $like): ?>
                                <?php if ( $like->user_id === $this->request->getAttribute('identity')->id ) :?>
                                    <?= $this->Html->link(__('<i class="fa-solid fa-heart post-liked"></i>'), ['controller' => 'Likes','action' => 'delete',  $like->id],['class' => 'superclass', 'escape' => false])?>
                                <?php endif ?>
                            <?php endforeach; ?>
                            <?php if ( $like->user_id !== $this->request->getAttribute('identity')->id ) :?>
                                <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                            <?php endif ?>
                        <?php else :?>
                            <?= $this->Html->link(__('<i class="fa-regular fa-heart post-notLiked"></i>'), ['controller' => 'Likes','action' => 'add',  $post->id],['class' => 'superclass', 'escape' => false])?>
                        <?php endif ?>
                        <?= $this->Html->link(__('<i class="fa-solid fa-comment-dots"></i>'), ['controller' => 'Comments','action' => 'index', ],['class' => 'superclass', 'escape' => false])?>
                    </div> 
                </div>
                <p class="post_description"><?= $post->description?></p>
               
                <div class="separator"></div>

                <div class="related">
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
                <?php else :?>
                    <p><?= __('Aucun commentaire') ?></p>
                <?php endif; ?>
            </div>
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
