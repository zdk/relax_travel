<?php
Library::import('recess_couch.RelaxModel');

define('IMAGE_PATH',RecessConf::$appsDir.'travel/public/i/');

class Note extends RelaxModel {
  public $attachment_path = IMAGE_PATH;
  
  public function all() {
    $map = "function(doc) { emit(null, doc); }";
  	return $this->map($map);
  }
}
?>