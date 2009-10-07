<?php
require 'couchdb/CouchDB.php';
class RelaxModel {
  public $attachment_path;
  public $meta = array();
  
	public function __construct($database, $options=array()) {
  	$newdb  = array('database'=>$database);
  	$this->db = new CouchDB($newdb);
  	$this->options = $options;
    if(array_key_exists('create', $options) && $options['create'] == true) $this->db->create_database();
    $this->meta['info'] = $this->db->info();
	}
		
	
	public function get($document_id){
	  $document = $this->db->document($document_id);
    RelaxModel::_getFile($document);
    return $document;
	}
	
	
	public function insert($document){
	  $result = $this->db->put($document);
	  RelaxModel::_fileHandlingFor($result);
    return $result['id'];
	}
	
	public function update($document_id, $document){
  	$result = $this->db->put($document, $document_id);
  	RelaxModel::_fileHandlingFor($result);
  	return $result['id'];
	}
	
	public function delete($document_id){
	  return $this->db->delete($document_id);
	}
	
	public function map($map_fn){
  	return $this->db->temp_view($map_fn);
	}
	
	public function reduce($map_fn, $reduce_fn){
  	return $this->db->temp_view($map_fn, $reduce_fn);
	}
	
	public function view($name){
    return $this->db->view($name);
	}
	
	private function _fileHandlingFor($result){
	  $class_name = strtolower(get_class($this));
    if($_FILES[$class_name]['error']['attachment'] == 0){
    	list($document_id,$document_revision) = array($result['id'],$result['rev']);
      list($name, $extension) = explode('/', $_FILES[$class_name]['type']['attachment']);
      $attachmentFile = $_FILES[$class_name]['tmp_name']['attachment'].".".$extension;
      rename($_FILES[$class_name]['tmp_name']['attachment'], $attachmentFile); // Tricky tmp adding file extension
    	$attachment['name'] = $_FILES[$class_name]['name']['attachment'];
    	$attachment['path'] = $attachmentFile;
      $this->db->put_attachment($attachment, $document_id, $document_revision);
    } 
	}
	
	private function _getFile($document){
	  if(isset($document['_attachments'])){                      
          foreach($document['_attachments'] as $name => $obj){
            $data = $this->db->attachment($document['_id'], $name);
            $folder = strtolower(get_class($this));
            $ptr = fopen($this->attachment_path.$folder."/".$name, 'wb');
            fwrite($ptr, $data);
            fclose($ptr);
          }
    }
	}
}
?>

