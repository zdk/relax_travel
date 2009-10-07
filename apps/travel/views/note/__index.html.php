<?php 
Layout::extend('layouts/note');
$title = 'Index';
?>

<h3><?php echo Html::anchor(Url::action('NoteController::newForm'), 'Create New Note') ?></h3>

<?php if(isset($flash)): ?>
	<div class="error">
	<?php echo $flash; ?>
	</div>
<?php endif; ?>

<?php foreach($noteSet as $note): ?>
	<?php Part::draw('note/details', $note) ?>
	<hr />
<?php endforeach; ?>