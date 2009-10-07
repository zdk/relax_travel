<?php
Layout::extend('layouts/travel');
Layout::input($title, 'string');
Layout::input($body, 'Block');

$title .= ' - Tag - ';

// $navigation = Part::block('parts/navigation');
?>