<div class=" users_login users form">
    <h1 class='title'>Festiv<br>app</h1>
    <section  class=" users_login_section">

    <span  class='info'>commence une nouvelle aventure festivale . </span>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('pseudo', [
            'required' => true,
            "placeholder"=>"pseudo",
            "label"=>false,
            ]) 
        ?>
        <?= $this->Form->control('password', [
            'required' => true,
            "placeholder"=>"password",
            "label"=>false,
            ]) 
        ?>
    </fieldset>
    <?= $this->Flash->render() ?>
    <?= $this->Form->submit(__('Se connecter'),[
        'class'=>'login-btn'
        ]); 
    ?>
    <div class="goToSignup">
        <span>pas encore membre ? </span>
        <?= $this->Html->link("Ajouter un utilisateur", ['action' => 'add', ]) ?>
    </div>
    <?= $this->Form->end() ?>
    </section>


</div>
