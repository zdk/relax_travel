<?php 
Layout::extend('layouts/note');
if(isset($note->id)) {
	$title = 'Edit Note #' . $note->id;
} else {
	$title = 'Create New Note';
}
$title = $title;
?>

<?php Part::draw('note/form', $_form, $title) ?>

<?php echo Html::anchor(Url::action('NoteController::index'), 'Note List') ?>