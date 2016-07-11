<?php

function open_session(){
	
	session_start();
	
}

function close_session(){
	
	session_destroy();
	
}

function read_session(){
	
}

function write_session(){
	
}

function destroy_session(){
	
	
}

function clean_session(){
	
	$_SESSION = array();
	
}

session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'clean_session');