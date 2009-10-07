<?php
Layout::input($title, 'string');
Layout::input($body, 'Block');
Layout::input($style, 'Block', new HtmlBlock());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  
  <title>Travel Notes - <?php echo $title; ?> </title> 
	<?php
	if(!$style->draw()) {
		Part::draw('parts/travel_style');
		Part::draw('parts/js');
	}
	?>

</head>

<body>

<p style="color: green"><%= flash[:notice] %></p>

<div class="container">
   			<?php echo $body; ?>
  
  <ul id="menu">
    <li><?php echo Html::anchor(Url::action('NoteController::index'), 'Notes') ?></li>
    <li><?php echo Html::anchor(Url::action('TagController::index'), 'Tags') ?></li>
    <li><?php echo Html::anchor(Url::action('NoteController::newForm'), '+ new Note') ?></li>
  </ul>
</div>

</body>
</html>
