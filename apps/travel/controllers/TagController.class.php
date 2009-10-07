<?php
Library::import('travel.models.Tag');
Library::import('recess.framework.forms.ModelForm');

/**
 * !RespondsWith Layouts
 * !Prefix tag/
 */
class TagController extends Controller {
	
	/** @var Tag */
	protected $tag;
	
	/** @var Form */
	protected $_form;
	
	function init() {
	  $this->tag = new Tag("travelnote");
    // $this->_form = new ModelForm('note', $this->request->data('note'), $this->note);
	}
	
	/** !Route GET */
	function index() {
    // exit;
    // $this->noteSet = $this->note->all();
    $count = $this->tag->count();
    $result = $count->result;
    $this->result = $result['rows'];
    // print_r($this->result);
	}
	

}
?>