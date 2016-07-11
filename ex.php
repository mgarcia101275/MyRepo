<?php

/* 
 *
 *
 *
 *
 */

class RWFile{
	private $_fp;
	private $data;
	private $page;


/*
 *
 *
 *
 */	

 function RWFile(){
		
 	$this->_fp = null;
 	$this->_nfp = null;
 	$this->data = array();
 	$file;
        $name;
	}


/*************************************************************************************/

/* The method */

/*************************************************************************************/

function read($file,$mode){
	if(!$this->_fp = @fopen($file,$mode)) throw new Exception('The file does not exist.');
	  
	$lines = file($file);
	
	foreach($lines as $num=>$value){
		echo $value."\n";
	}

}

/**************************************************************************************

**

**************************************************************************************/

function getData(){
	return $this->data;
}

/***************************************************************************************

**

***************************************************************************************/

function write($file,$mode){
	$this->_fp = @fopen($file,$mode);
	$write = fwrite($this->_fp,$this->data);
}

/***************************************************************************************

**

***************************************************************************************/

function setName($name){

 $this->name = $name;

}

/***************************************************************************************

**

***************************************************************************************/

function getName(){

 return $this->name;

}


/***************************************************************************************

* This method clean the memory used by the object*

***************************************************************************************/ 
function __destruct(){}

}  //end of class