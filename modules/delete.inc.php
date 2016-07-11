<?php 
 //Check that request has been send
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	
 	include('includes/connection.php');
 	include('includes/functions.inc.php');
 	
 	//Inicialize errors handler.
 	
 	$errors = array();
 	
 	 //Check all fields looking for errors

 	//Checking first name
 	if(!empty($_POST['fname'])){
 		
 		$fn = mysqli_real_escape_string($dbc,$_POST['fname']);
 		
 	} else {
 		
 		$errors[] = "You must to write your first name.";
 		
 	}//End of empty name IF
 	
 	//Checking last name
 	
 	if(!empty($_POST['lname'])){
 			
 		$ln = mysqli_real_escape_string($dbc,$_POST['lname']);
 			
 	} else {
 			
 		$errors[] = "You must to write your name.";
 			
 	}//End of empty last name IF
 	
 	//checking email
 	
 	if(!empty($_POST['email'])){
 		
 		$e = mysqli_real_escape_string($dbc,$_POST['email']);
 		
 		if(!checkEmail($e)){//Checking email format.
 			
 			$errors[]="The email has an invalid format.";
 			
 		}//End of checkEmail IF
 			
 	} else {
 		
 		$errors[] = "You must to write your email.";
 		
 	}//End of empty email IF
 	
 	//Checking username
 	
 	if(!empty($_POST['username'])){
 			
 		$un = mysqli_real_escape_string($dbc,$_POST['username']);
 			
 	} else {
 			
 		$errors[] = "You must to write a username.";
 			
 	}//End of empty username IF
 	
 	//Checking Password
 	
 	if(!empty($_POST['pass'])){
 		
 		//Check Password confirmation
 		
 		if($_POST['pass'] != $_POST['pass2']){
 			
 			$errors[] = "Your Password and Password Confirmation do not match";
 		
 		} else {
 			
 			if(!checkStrengh($_POST['pass'])){
 				
 				$errors[] = "Your Password is not enough strong";
 			
 			} else {
 				
 				$p = mysqli_real_escape_string($dbc,$_POST['pass']);
 				
 			}//End checkStrengh IF
 		}//End password Confirmation IF.
 		
 	} else {
 		
 		$errors[] = "You must to write a Password.";
 		
 	}//End of empty password IF.
 	
 	//Checking phone.
 	
 	if(!empty($_POST['phone'])){
 			
 		$ph = mysqli_real_escape_string($dbc,$_POST['phone']);
 			
 	} else {
 			
 		$errors[] = "You must to write your Phone number.";
 			
 	}//End of empty phone IF
 	
 	//Checking address
 	
 	if(!empty($_POST['address'])){
 	
 		$a = mysqli_real_escape_string($dbc,$_POST['address']);
 	
 	} else {
 	
 		$errors[] = "You must to write your address.";
 	
 	}
 	
 	//Checking number.
 	
 	if(!empty($_POST['number'])){
 	
 		$num = mysqli_real_escape_string($dbc,$_POST['number']);
 	
 	} else {
 	
 		$errors[] = "You must to write your house or apt number.";
 	
 	}
 	
 	//Checking zip code.
 	
 	if(!empty($_POST['zip'])){
 	
 		$z = mysqli_real_escape_string($dbc,$_POST['zip']);
 	
 	} else {
 	
 		$errors[] = "You must to write your Zip Code.";
 	
 	}
 	
 	//Checking City
 	
 	if(!empty($_POST['city'])){
 	
 		$ct = mysqli_real_escape_string($dbc,$_POST['city']);
 	
 	} else {
 	
 		$errors[] = "You must to write your City.";
 	
 	}
 	
 	//Checking State
 	
 	if(!empty($_POST['state'])){
 	
 		$st = mysqli_real_escape_string($dbc,$_POST['state']);
 	
 	} else {
 	
 		$errors[] = "You must to write your State.";
 	
 	}
 	
 	
 	if(empty($errors)){
 		
 		if(!isset($_SESSION['usertype'])){
 			
 			$utype = "user";
 			
 		} else if(isset($_SESSION['usertype'])&& ($_SESSION['usertype']=='admin')){
 			
 			$utype = $_POST['utype'];
 		}
	
 	    //Create the query
 	    
 		$q = "INSERT INTO users (username,password,usertype) VALUES ('$un',SHA1('$p'),'$utype')";
 		
 		
 		//Executing query
 		$r = mysqli_query($dbc,$q);
 		
 		
 		if($r){//Run ok
 			
 		  $uid = mysqli_insert_id($dbc);
          $q = "INSERT INTO users_data(user_id,fname,lname,email,phone,address,number,zip_code,city,state,registration_date) VALUES ('$uid','$fn','$ln','$e','$ph','$a','$num','$z','$ct','$st',NOW())";
          $r = mysqli_query($dbc,$q);
          
          if($r){//Run ok
          	
          	 echo "<h2>Congratulations:</h2>Your data has been registered into our system.";
          	 
          } else {
          	
          	echo '<h2 class="error">ERROR:</h2> Your email could not be inserted into our records due a system error.
 					We appolize with you by the inconveniences.';
          	
          }
          
          mysqli_close($dbc);
          	
          exit;
 			
 		} else {
 			
 			echo '<h2 class="error">ERROR:</h2> Your email could not be inserted into our records due a system error.
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
<h1>User's Registration System</h1>
        <form action="index.php?p=register" method="post">
          <div class="form_settings">
            <h2>User information</h2>
            <p><span>First Name</span><input class="contact" type="text" name="fname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname'];}?>" /></p>
            <p><span>Last Name</span><input class="contact" type="text" name="lname" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname'];}?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>" /></p>
            <p><span>User Name</span><input class="contact" type="text" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];}?>" /></p>
            <p><span>Password</span><input class="contact" type="password" name="pass" value="<?php if(isset($_POST['pass'])){ echo $_POST['pass'];}?>" /></p>
            <p><span>Password Confirmation</span><input class="contact" type="password" name="pass2" value="<?php if(isset($_POST['pass2'])){ echo $_POST['pass2'];}?>" /></p>
            <p><span>Phone</span><input class="contact" type="text" name="phone" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone'];}?>" /></p>
            <h2>Address Information</h2>
            <p><span>Address</span><input class="contact" type="text" name="address" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];}?>" /></p>
            <p><span>No. #</span><input class="contact" type="text" name="number" value="<?php if(isset($_POST['number'])){ echo $_POST['number'];}?>" /></p>
            <p><span>Zip code</span><input class="contact" type="text" name="zip" value="<?php if(isset($_POST['zip'])){ echo $_POST['zip'];}?>" /></p>
            <p><span>City</span><input class="contact" type="text" name="city" value="<?php if(isset($_POST['city'])){ echo $_POST['city'];}?>" /></p>
            <p><span>State</span><input class="contact" type="text" name="state" value="<?php if(isset($_POST['state'])){ echo $_POST['state'];}?>" /></p>
            <?php if(isset($_SESSION['usertype']) && ($_SESSION['usertype']=='admin')){?>
            <p><span>User Type:</span><select class="contact" name="utype"><option value="admin">Administrator</option><option value="user">User</option></select></p>
            <?php }?>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="user_registered" value="submit" /></p>
          </div>
        </form>
        <p><br /><br />NOTE: All fields are required.Please do not leave any empty or misfilled that could generate a delay to your registration process</p>