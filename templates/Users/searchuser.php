<div class="search-section">
    <div class="search-users content">
        <h2 class="title-page">recherche</h2>
        <div class="separator"></div>
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
        <span  class="search-title">Nombre de résultat : <?= $tabS->count() ?></span>
        <div class="search-users-result">
            <ul>
                <?php foreach($tabS as $s) : ?>
                    <li>
                        <a href='/users/view/<?= $s->id?>'>
                            <div class="users-info-picture search-users-picture">
                                <?php if ( $s->has('photo')) :?>
                                    <figure>
                                        <img class="user_picture" src='/webroot/img/profils/<?=($s->photo)?>' alt="photo de l'utilisateur" width="100" height="100">
                                    </figure>
                                <?php else :?>
                                    <figure>
                                        <img class="user_picture" src='/webroot/img/profils/user-no-picture?>' alt="photo de l'utilisateur" width="100" height="100">
                                    </figure>
                                <?php endif ?>
                            </div>
                            <span class="search-title"><?=$s->pseudo ?></span>
                        </a>
                    </li>
                    <div class='line'></div>


                <?php endforeach; ?>
            </ul>
        </div>
                
    </div>
</div>
