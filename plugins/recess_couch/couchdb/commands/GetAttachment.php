<?php
/**
 *    CouchDB_PHP
 * 
 *    Copyright (C) 2009 Adam Venturella
 *
 *    LICENSE:
 *
 *    Licensed under the Apache License, Version 2.0 (the "License"); you may not
 *    use this file except in compliance with the License.  You may obtain a copy
 *    of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 *    This library is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
 *    without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR 
 *    PURPOSE. See the License for the specific language governing permissions and
 *    limitations under the License.
 *
 *    Author: Adam Venturella - aventurella@gmail.com
 *
 *    @package CouchDB_PHP
 *    @author Adam Venturella <aventurella@gmail.com>
 *    @copyright Copyright (C) 2009 Adam Venturella
 *    @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 *
 **/

/**
 * Includes
 */
require_once 'CouchDBCommand.php';

/**
 * Get Attachment Command
 *
 * @package Commands
 * @author Adam Venturella
 */
class GetAttachment implements CouchDBCommand 
{
	private $database;
	private $name;
	private $document;
	
	/**
	 * undocumented function
	 *
	 * @param string $database 
	 * @param string $document 
	 * @param string $name 
	 * @author Adam Venturella
	 */
	public function __construct($database, $document, $name)
	{
		$this->database     = $database;
		$this->document     = $document;
		$this->name         = $name;
	}
	
	public function request()
	{
		 return <<<REQUEST
GET /$this->database/$this->document/$this->name HTTP/1.0
Connection: close
{authorization}


REQUEST;
	}
	
	public function __toString()
	{
		return 'GetAttachment';
	}
}
?>