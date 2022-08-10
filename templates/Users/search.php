<div class="search-section">
    <div class="search content">
        <?= $this->Form->create(null,   ['url' => ['controller'=> 'Users', 'action' => 'searchuser']]) ?>

            <?= $this->Form->control('search', [
                "label"=>false,
                "placeholder"=>"rechercher un utilisateur"
                ])
            ?>
            <button type="submit">
                <i class="fa-solid fa-heart fa-magnifying-glass" ></i>
            </button>
        <?= $this->Form->end() ?>


        <section class="search-users-suggestion">
            <h2 class="search-title"><?= __('Festivaliers') ?></h2>
            <ul>
            <?php foreach ($randUsers as $randU): ?>
                <li>
                    <?= $this->Html->link(__($randU->pseudo), ['controller' => 'Users','action' => 'view',  $randU->id])?>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>

        <section class="search-users-posts">
            <h2 class="search-title"><?= __('Posts populaires') ?></h2>
            <ul>
            <?php foreach ($topFivePost as $post): ?>
                <li>
                    <?php $post_name =  $post->post->content ?>
                    <?= $this->Html->link(__("
                        <figure>
                            <img class='user_post' src='/webroot/img/posts/$post_name' alt='post de utilisateur' width='100%' height='100%'>
                        </figure>
                    "), ['controller' => 'Posts', 'action' => 'view', $post->post_id],['class' => 'superclass', 'escape' => false]) ?>
                    <span class="nb-like">  
                        <?= $post->nb?>
                        <i class="fa-solid fa-heart"></i>
                    </span>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>



    </div>
</div>
