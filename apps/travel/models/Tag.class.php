<?php
Library::import('recess_couch.RelaxModel');
class Tag extends RelaxModel {

  public function count() {
    $map = "function(doc) { if (doc.type == 'Note' && doc.tags) { doc.tags.map(function(tag) { emit(tag, doc); }); }}";
    $reduce = "function(key, values, combine) { return {'tag':key['0']['0'], 'count':values.length};}";
    return $this->reduce($map,$reduce);
	  // return $this->view('tags/count');
	}
}
?>