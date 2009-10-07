<?php
Library::import('travel.models.Note');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts
 * !Prefix note/
 */
class NoteController extends Controller {
	
	/** @var Note */
	protected $note;
	
	/** @var Form */
	protected $_form;
	
	function init() {
    $db_name = "travelnote";
  	
	  $this->note = new Note("travelnote");
	  if(isset($this->note->meta['info']['error'])) $this->note = new Note("travelnote", array('create' => true));
    // $this->_form = new ModelForm('note', $this->request->data('note'), $this->note);
	}
	
	/** !Route GET */
	function index() {
    $this->noteSet = $this->note->all()->result['rows'];
	}
	
	/** !Route GET, $id */
	function details($id) {
	  $this->document = $this->note->get($id);
	}
	
	/** !Route GET, new */
	function newForm() {
    // $this->_form->to(Methods::POST, $this->urlTo('insert'));
		return $this->ok('form');
	}
	
	/** !Route POST */
	function insert() {
    $post_obj = $this->request->post['note'];
    $post_obj['tags'] = explode(",",$this->request->post['note']['tags']);
    $post_obj['type'] = "Note";
    $id = $this->note->insert(json_encode($post_obj));
    return $this->created($this->urlTo('details', $id));    
	}
	
	/** !Route GET, $id/edit */
	function editForm($id) {
	  $this->id = $id;
	  $this->document = $this->note->get($id);
    return $this->ok('form');
	}
	
	/** !Route PUT, $id */
	function update($id) {
	  $post_obj = $this->request->put['note'];
    $post_obj['tags'] = explode(",",$this->request->post['note']['tags']);
    $post_obj['type'] = "Note";
    
  	$this->note->update($id, json_encode($post_obj));
	  return $this->forwardOk($this->urlTo('details', $id));
    // $oldNote = new Note($id);
    // if($oldNote->exists()) {
    //  $oldNote->copy($this->note)->save();
    //  return $this->forwardOk($this->urlTo('details', $id));
    // } else {
    //  return $this->forwardNotFound($this->urlTo('index'), 'Note does not exist.');
    // }
	}
	
	/** !Route DELETE, $id */
	function delete($id) {
	  $this->note->delete($id);
	  return $this->forwardOk($this->urlTo('index'));
	}
}
?>