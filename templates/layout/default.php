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

$cakeDescription = "Festiv'App";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="Festiv'App : l'application destinée  aux passionnés de festivals !">
    <meta name="author" content="Chelsey Millo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.ico" />
    <link rel="apple-touch-icon" href="/img/logo-192.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'all.min']) ?>
    <?= $this->Html->script(['index']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('webfonts') ?>
    <?= $this->fetch('script') ?>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js');
        }
    </script>

    <script>
        const csrfToken = "<?= h($this->request->getAttribute('csrfToken')); ?>";
    </script>
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
            <div class="nav-links">
                    <?= $this->Html->link('<i class="fa-solid fa-house"></i>', ['controller'=>'Posts','action'=>'index'],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-magnifying-glass"></i>', ['controller'=>'Users','action'=>'search'],['class' => 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-plus"></i>', ['controller'=>'Posts','action'=>'add' ],['class' => 'addPost_icon', 'superclass', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-user"></i>', ['controller'=>'Users','action'=>'view',$this->request->getAttribute('identity')->id ],['class' => 'superclass', 'escape' => false]) ?>
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
