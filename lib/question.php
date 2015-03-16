<?php
/**
 * An adaptation of the User used in last lecture.
 * @author jgruiz
 *
 */
require_once "config.php";

class Question {
	public $id	= ""; //Question ID
	public $text = ""; // Question Text
	
	public function __construct($id = "", $text = ""){
		$this->id = $id;
		$this->text = $text;
	}
	
}
?>