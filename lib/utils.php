<?php


class Utils{
	/**
	 * File containing utility functions
	 */
	//Adding a function to check if input has error
	//and if so return class
	public static function checkForError($field_name){
		//Need to tell php we are using global errors
		global $errors; 
		//Short hand if statement
		return (isset($errors[$field_name]))? " error": "";
	}
	//Use this because form_data doesn't always have the value set
	public static function getValue($field_name){
		global $form_data;
		return (isset($form_data[$field_name]))? $form_data[$field_name] : "";
	}
	
	
}