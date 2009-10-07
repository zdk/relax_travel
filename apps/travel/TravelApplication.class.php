<?php
Library::import('recess.framework.Application');

class TravelApplication extends Application {
	public function __construct() {
		
		$this->name = 'Travel Notes';
		
		$this->viewsDir = $_ENV['dir.apps'] . 'travel/views/';
		
		$this->assetUrl = $_ENV['url.assetbase'] . 'apps/travel/public/';
		
		$this->modelsPrefix = 'travel.models.';
		
		$this->controllersPrefix = 'travel.controllers.';
		
		$this->routingPrefix = 'travel/';
		
	}
}
?>