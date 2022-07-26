<!-- <?php $this->assign('title', 'Modifier la photo de '.h($a->pseudo).' - Spotilike') ?> -->

<h1>Modifier la photo de <?= h($a->pseudo) ?></h1>

<?= $this->Form->create($a, ['enctype' => 'multipart/form-data']) ?>
	
<?= $this->Form->control('image', ['label' => 'Votre fichier', 'type' => 'file']) ?>

<?= $this->Form->button('Envoyer') ?>

<?= $this->Form->end() ?>