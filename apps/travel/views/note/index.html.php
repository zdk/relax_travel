<?php 
Layout::extend('layouts/note');
$title = '[Index]';
?>

<?php foreach($noteSet as $note): ?>
<h2><a href="/relax_travel/travel/note/<?= $note['id'] ?>"><?= $note['value']['title'] ?></a></h2>
  <p><?= $note['value']['description'] ?></p>
  <small><em>Tags:</em> <?= implode(",",$note['value']['tags']); ?></small>
  <p><a href="/relax_travel/travel/note/<?= $note['id'] ?>/edit">Edit</a></p>
	<hr />
<?php endforeach; ?>