<?php
Layout::extend('layouts/travel');
Layout::input($title, 'string');
Layout::input($body, 'Block');

$title .= ' - Note - ';

// $navigation = Part::block('parts/navigation');
?>