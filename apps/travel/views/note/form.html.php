<?php 
Layout::extend('layouts/note');

if(isset($id)) {
	$title = 'Edit Note #' . $id;
} else {
	$title = 'Create New Note';
}
$title = $title;
?>
  
  	<fieldset>
  		<legend id="title"><?= $title ?></legend>

      <? if(isset($id)){ ?>
        <form method="POST" action="/relax_travel/travel/note/<?= $id; ?>" enctype="multipart/form-data" id="new_note">
        <input type="hidden" name="_METHOD" value="PUT" />
        <input id="note__rev" name="note[_rev]" type="hidden" value="<?= $document['_rev']; ?>" />
        <label for="note_Title">Title</label>
        
        <input id="note_title" name="note[title]" size="30" type="text" value="<?= $document['title']; ?>"/>

        <label for="note_Description">Description</label>
        <textarea cols="40" id="note_description" name="note[description]" rows="20"><?= $document['title']; ?></textarea>

        <label for="note_Tags (separated by spaces)">Tags (separated by spaces)</label>

        <input id="note_tags" name="note[tags]" size="30" type="text" value="<?= implode(",",$document['tags']); ?>" />

        <label for="note_Visited On">Visited on</label>
        <input id="date" name="note[visited_on]" size="30" type="text" value="<?= $document['visited_on']; ?>"/>
      <? }else{ ?>
        <form action="<?= Url::action('NoteController::insert') ?>" class="new_note" enctype="multipart/form-data" id="new_note" method="post">
        <label for="note_Title">Title</label>
        <input id="note_title" name="note[title]" size="30" type="text" />

        <label for="note_Description">Description</label>
        <textarea cols="40" id="note_description" name="note[description]" rows="20"></textarea>

        <label for="note_Tags (separated by spaces)">Tags (separated by spaces)</label>

        <input id="note_tags" name="note[tags]" size="30" type="text" value="" />

        <label for="note_Visited On">Visited on</label>
        <input id="date" name="note[visited_on]" size="30" type="text" />
      <? }?>
      
      <input name="authenticity_token" type="hidden" value="d730deafaf66c74c541d4b52e596fec2309c6661" />
      

      <label for="note_Attachment">Attachment</label>
      <input id="note_attachment" name="note[attachment]" size="30" type="file" />

      <input id="note_submit" name="commit" type="submit" value="Save" />


    </form>
    
  	</fieldset>