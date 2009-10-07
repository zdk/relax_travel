<?php
Layout::input($title, 'string');
Layout::input($body, 'Block');
Layout::input($style, 'Block', new HtmlBlock());
?>
<html>
	<head>
		<?php
		if(!$style->draw()) {
			Part::draw('parts/style');
		}
		?>
		<title>Travel Notes - <?php echo $title; ?></title> 
	</head>
	<body>
	<div class="container">
		<div class="span-24">
			<h1>Travel Notes</h1>
		</div>
		<div class="span-24 last">
			<div class="navigation">
			<?php //echo $navigation; ?>
			</div>
			<?php echo $body; ?>
		</div>
		<div class="span-24 footer">
		  <p class="quiet bottom">
		  	 <?php echo Html::anchor('/travel/', 'Travel Notes') ?> is &copy; <?php echo date('Y'); ?>
		 	 {Insert Kick-ass App Developer Name Here}. All rights reserved.
		  </p>
		</div>
		</div>
	</body>
</html>