<?php 
Layout::extend('layouts/tag');
$title = '[Index]';
?>

<h1>Tag (cloud?)</h1>
<hr/>

<?php foreach($result as $r): ?>
  <font size='<?= $r['value']['count']; ?>'><?= $r['key']; ?>(<?= $r['value']['count'] ?>) </font><br />
<?php endforeach; ?>