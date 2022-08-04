<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row users_signup">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link('<span class="arrow-left"></span>', ['controller'=>'Users','action'=>'index'],['class' => 'superclass', 'escape' => false]) ?>
            <h2 class="title">Créer un compte .</h2>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <section  class=" users_add_section">

                <?= $this->Form->create($user) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('festival', [
                            "placeholder"=>"festival",
                            "label"=>false,
                            ])
                        ;
                        echo $this->Form->control('firstname', [
                            'required' => true,
                            "placeholder"=>"nom",
                            "label"=>false,
                            ]) 
                        ;
                        echo $this->Form->control('lastname', [
                            'required' => true,
                            "placeholder"=>"prenom",
                            "label"=>false,
                            ])
                        ;
                        echo $this->Form->control('email', [
                            'required' => true,
                            "placeholder"=>"email",
                            "label"=>false,
                            ])
                        ;
                        echo $this->Form->control('pseudo', [
                            'required' => true,
                            "placeholder"=>"pseudo",
                            "label"=>false,
                            ])
                        ;
                        
                        echo $this->Form->control('password', [
                            'required' => true,
                            "placeholder"=>"password",
                            "label"=>false,
                            ])
                        ;

                    ?>
                </fieldset>
                <?= $this->Form->button(__("S'inscrire"),[
                    'class'=>'signup-btn'
                    ]);  
                ?>
                <?= $this->Form->end() ?>

                <div class="goToLogin">
                    <span>déjà membre ? </span>
                    <?= $this->Html->link("Se seconnecter", ['action' => 'index' ]) ?>
                </div>
            </section>

        </div>
    </div>
</div>
