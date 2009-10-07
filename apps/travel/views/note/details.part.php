<?php
Part::input($note, 'Note');
?>
<form method="POST" action="<?php echo Url::action('NoteController::delete', $note->id) ?>">
	<fieldset>
	<h3><?php echo Html::anchor(Url::action('NoteController::details', $note->id), 'Note #' . $note->id) ?></h3>
	<p>
		<strong>Name</strong>: <?php echo $note->name; ?><br />

	</p>
	<?php echo Html::anchor(Url::action('NoteController::editForm', $note->id), 'Edit') ?> - 
	<input type="hidden" name="_METHOD" value="DELETE" />
	<input type="submit" name="delete" value="Delete" />
	</fieldset>
</form>