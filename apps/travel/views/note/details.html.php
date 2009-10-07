<?php 
Layout::extend('layouts/note');
	$title = 'DETAILS:';
?>

  <form method="POST" action="<?php echo Url::action('NoteController::delete', $document['_id']) ?>">
  	<fieldset>
  	<p>
  		<strong>Name</strong>: <?php echo $document['title']; ?><br />
  	</p>

       Title: <?= $document['title']; ?> <br />
       Description: <?= $document['description']; ?> <br />
       Tags: <?= implode(",",$document['tags']); ?> <br />
      <? if(isset($document['_attachments'])){?>
      <?php foreach($document['_attachments'] as $name => $obj): ?>
        Filename: <?= $name ?>
        <img src='/relax_travel/apps/travel/public/i/note/<?= $name; ?>' width='120' height='120' /> 
      <?php endforeach; ?>
      <? } ?>
  	</fieldset>
  	
  		<input type="hidden" name="_METHOD" value="DELETE" />
    	<input type="submit" name="delete" value="Delete" />
    
  </form>


<?php echo Html::anchor(Url::action('NoteController::index'), 'Back to list') ?>
