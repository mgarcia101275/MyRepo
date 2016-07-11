<?php 
 //Check that request has been send
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	
 	include('includes/connection.php');
 	include('includes/functions.inc.php');
 	
 	//Inicialize errors handler.
 	
 	$errors = array();
 	
 	 //Check all fields looking for errors

 	//Checking name
 	if(!empty($_POST['name'])){
 		
 		$n = mysqli_real_escape_string($dbc,$_POST['name']);
 		
 	} else {
 		
 		$errors[] = "You must to write your name.";
 		
 	}//End of empty name IF
 	
 	//checking email
 	
 	if(!empty($_POST['email'])){
 		
 		$e = mysqli_real_escape_string($dbc,$_POST['email']);
 		
 		if(!checkEmail($e)){//Checking email format.
 			
 			$errors[]="The email has an invalid format.";
 			
 		}//End of checkEmail IF
 			
 	} else {
 		
 		$errors[] = "You must to write your email.";
 		
 	}//End of empty email IF
 	
 	//Checking Comments
 	
 	if(!empty($_POST['comments'])){
 		
 		$c = $_POST['comments'];
 			
 	} else {
 		
 		$errors[] = "You can not send an empty comment, please fill it.";
 		
 	}//End of empty comments IF
 	
 	if(empty($errors)){
	
 	    //Create the query
 	    
 		$q = "INSERT INTO emails (name,email,comments) VALUES ('$n','$e','$c')";
 		
 		//Executing query
 		$r = mysqli_query($dbc,$q);
 		
 		
 		if($r){//Run ok
 			
 			
 			echo '<h2>Thank You:</h2> for Leave us your comments.';
 			
 		} else {
 			
 			echo '<h2>ERROR:</h2> Your email could not be inserted into our records due a system error.
 					We appolize with you by the inconveniences.';
 		}
 		
 		mysqli_close($dbc);
 		
 		exit;
 		
 	} else {
 		
 		foreach($errors as $m){
 			
 			echo '<p class="error">'.$m.'</p>';
 			
 		}//End of foreach loop
 		
 	}//End of empty $errors IF
 	
 	mysqli_close($dbc);
 	
 }//End of main IF

?>
<h1>Contact Us</h1>
        <p>By this way you can leave us your comments:</p>
        <form action="index.php?p=contact" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="comments" value="<?php if(isset($_POST['comments'])){ echo $_POST['comments'];}?>"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
        <p><br /><br />NOTE: A contact form such as this would require some way of emailing the input to an email address.</p>