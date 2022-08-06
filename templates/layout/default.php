<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'all.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('webfonts') ?>
    <?= $this->fetch('script') ?>
</head>
<body 
    <?= str_contains($_SERVER[ 'REQUEST_URI' ],'/users/login') || str_contains($_SERVER[ 'REQUEST_URI' ],'/users/add')? 
    'class = bg_connexion 
    style = "background-image: url(../img/app_design/bg_home.webp)"' 
    : 
    'class = bg_initial 
    style = "background: linear-gradient(168.13deg, rgba(0, 138, 166, 0.2) 25%, rgba(246, 162, 120, 0.2) 61.81%)"' ?>
>
<?php if ($this->request->getAttribute('identity')) :?>
    <nav class="nav">
        <!-- <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div> -->
            <div class="nav-links">
                    <?= $this->Html->link('<i class="fa-solid fa-house"></i>', ['controller'=>'Posts','action'=>'index'],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-magnifying-glass"></i>', ['controller'=>'Users','action'=>'search'],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-message"></i>', ['controller'=>'Messages','action'=>'index'],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-user"></i>', ['controller'=>'Users','action'=>'view',$this->request->getAttribute('identity')->id ],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-plus"></i>', ['controller'=>'Posts','action'=>'add' ],['class' => 'addPost_icon', 'superclass', 'escape' => false]) ?>

                    <!-- <?= $this->Html->link('Mon compte', ['controller'=>'Users','action'=>'view',$this->request->getAttribute('identity')->id ]) ?>
                    <?= $this->Html->link('Ajout Posts', ['controller'=>'Posts','action'=>'add' ]) ?>
                    <?= $this->Html->link('Se deconnecter', ['controller'=>'Users','action'=>'logout']) ?> -->
            </div>
    </nav>
<?php endif; ?>

    
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
