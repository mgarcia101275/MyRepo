<?php # Script 7.1 - Config.php

class Config{
	
	private static $_instance = NULL;
	private $_settings = array();
	
	
	private function __construct(){}
	private function __clone(){}
	
	//This Method return the instances of an object. 
	
	static function getInstance(){
		if(self::$_instance == NULL){
			self::$_instance = new Config();
		}
		
		return self::$_instance;
	}
	
	/*This method takes two arguments a index and a value.
	 * 
	 * It's used to manipulate the settings array.
	 */
	
	 function set($index,$value){
	 	$this->_settings[$index] = $value;
	 }
	 
	 //This method return the current settings.
	 
	 function get($index){
	 	return $this->_settings[$index];
	 }
}//End of Config class.