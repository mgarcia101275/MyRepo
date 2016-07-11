<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
	
	//Including the config file.
	
	include('includes/functions.inc.php');
	
	//Including the database connection
	
	require('includes/connection.php');
	
	//Inicializing errors handler.
	$errors = array();
	
	//Checking errors
	
	//Checking username
	
	if(!empty($_POST['username'])){
		
		$uname = mysqli_real_escape_string($dbc,$_POST['username']);
		
	} else {
		
		$errors[] = "You forgot to write your User name.";
		
	}
	
	//Checking password
	
	if(!empty($_POST['password'])){
	
		$pass = mysqli_real_escape_string($dbc,$_POST['password']);
		$pass = SHA1($pass);
	
	} else {
	
		$errors[] = "You forgot to enter your password.";
	
	}
	
	//Checking empty $errors
	
	if(empty($errors)){
		
		//Writing the query
		
		$q = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
		
		//Executing the query
		
		$r = mysqli_query($dbc,$q);
		
	
		if($r){//If everything is ok
			
			    while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
			    	
			    !$_SESSION?true:false;
			   
				//Asigning valuse to $_SESSION vars username and usertype.
				$id = $row['user_id'];
				$_SESSION['usertype'] = $row['user_type'];
				$_SESSION['user_id'] = $row['user_id'];
				
				$q = "SELECT fname,lname FROM users_data WHERE user_id='$id'";
					
				$r = mysqli_query($dbc,$q);
					
				if($r){
				
					while($row2 = mysqli_fetch_array($r,MYSQLI_ASSOC)){
							
						$fullname = $row2['fname']. '  ' .$row2['lname'];
						$_SESSION['username'] = $fullname;
							
					}//End of second While loop
				
				}//End of secondary $r query
				
			}//End of while loop.
			
			//Closing conexion to the database and redirecting to the page that generated the script call.
			
			mysqli_close($dbc);
			redirect_user('index.php');
		} else {
			
			$errors[] = 'Username or Password are incorrect, please try it again.';
						
		}//End of Run ok $r IF
		
	} else {
		
		//Printing public errors. 
		
		foreach($errors as $msg){
			
			echo '<p class="error">'.$msg.'</p><br/>';
		}
		
		//Closing conexion to the database.
	
	mysqli_close($dbc);
	
	} //End of empty $errors IF.
	
	
}
?>
<form method="post" action="index.php?p=login" name="flogin">
		<div class="form_settings">
	      <p>Username:</p><input class="contact" type="text" name="username"><br/>
	      <p>Password:</p><input class="contact" type="password" name="password"><br/>
	      <input type="submit" name="logme" value="Sign in">
	      </div>
	     </form>

 