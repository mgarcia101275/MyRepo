<?php 
if((isset($_GET['id']))&&($_GET['id']!='')){
	
	//include the connection string.
	include('includes/connection.php');
	
	$id = $_GET['id'];
	
	//Create a query using the id as condition to get all about this user.
	
	$q = "select username,user_type from users where user_id =".$id;
	
	//executing query one
	
	$r = mysqli_query($dbc,$q);
	
	
	while($ut = mysqli_fetch_array($r,MYSQLI_ASSOC)){
	
		$uname = $ut['username'];
		$utype = $ut['user_type'];
		$utypeValue = $ut['user_type'];
	}
			
	$q2 = "select * from users_data where user_id = ".$id;
	
	//Executing second query to get all other information about the user.
	
	$r2 = mysqli_query($dbc,$q2);
	
	
	
	while($rw = mysqli_fetch_array($r2,MYSQLI_ASSOC)){
	
		
		$fname = $rw['fname'];
		$lname = $rw['lname'];
		$email = $rw['email'];
		$phone = $rw['phone'];
		$address = $rw['address'];
		$num = $rw['number'];
		$zip = $rw['zip_code'];
		$city = $rw['city'];
		$state = $rw['state'];
		
	}//End of second while statement.
	
	mysqli_close($dbc);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	include('includes/connection.php');
	
	$id = $_POST['id'];
	$uname = $_POST['username'];
	$utype = $_POST['utype'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$num = $_POST['number'];
	$zip = $_POST['zip'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	
	echo $id;
	
	if($dbc) echo 'everything is ok';
    $q = "Update users_data set fname='$fname', lname='$lname', email='$email', phone='$phone', address = '$address', number = '$num', zip_code = '$zip', city = '$city', state = '$state' where user_id = '$id'";
	
	$r= mysqli_query($dbc,$q);
	
	$q1 = "Update users set username='$uname', user_type = '$utype' where user_id ='$id'";
	
	$r1 = mysqli_query($dbc,$q1);
	
	echo mysqli_affected_rows($dbc);
	
	if(($r)&&($r1)){echo"ok";}else {echo 'wrong';}
	
	mysqli_close($dbc);
	
	//Redirect the user to a updates page or load a fancy box page that will close after 10 seconds
}
?>
<h1>User's Registration System</h1>
        <form action="index.php?p=update" method="post">
          <div class="form_settings">
            <h2>User information</h2>
            <p><span>First Name</span><input class="contact" type="text" name="fname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname'];} else if(isset($fname)){ echo $fname;}?>" /></p>
            <p><span>Last Name</span><input class="contact" type="text" name="lname" value="<?php if(isset($_POST['lname'])){ echo $_POST['lname'];} else if(isset($lname)){ echo $lname;}?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} else if(isset($email)){ echo $email;}?>" /></p>
            <p><span>User Name</span><input class="contact" type="text" name="username" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} else if(isset($uname)){ echo $uname;}?>" /></p>
            <p><span>Phone</span><input class="contact" type="text" name="phone" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone'];} else if(isset($phone)){ echo $phone;}?>" /></p>
            <h2>Address Information</h2>
            <p><span>Address</span><input class="contact" type="text" name="address" value="<?php if(isset($_POST['address'])){ echo $_POST['address'];} else if(isset($address)){ echo $address;}?>" /></p>
            <p><span>No. #</span><input class="contact" type="text" name="number" value="<?php if(isset($_POST['number'])){ echo $_POST['number'];}  else if(isset($num)){ echo $num;}?>" /></p>
            <p><span>Zip code</span><input class="contact" type="text" name="zip" value="<?php if(isset($_POST['zip'])){ echo $_POST['zip'];}  else if(isset($zip)){ echo $zip;}?>" /></p>
            <p><span>City</span><input class="contact" type="text" name="city" value="<?php if(isset($_POST['city'])){ echo $_POST['city'];}  else if(isset($city)){ echo $city;}?>" /></p>
            <p><span>State</span><input class="contact" type="text" name="state" value="<?php if(isset($_POST['state'])){ echo $_POST['state'];}  else if(isset($state)){ echo $state;}?>" /></p>
            <?php if(isset($_SESSION['usertype']) && ($_SESSION['usertype']=='admin')){?>
            <p><span>User Type:</span><select class="contact" name="utype"><option value="<?php  if(isset($_POST['utype'])){echo $_POST['utype'];} else if(isset($utype)){echo $utype;}?>"><?php  if(isset($_POST['utype'])){echo $_POST['utype'];} else if(isset($utype)){echo $utypeValue;}?></option><option value="admin">Administrator</option><option value="user">User</option></select></p>
            <?php }?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="data_update" value="submit" /></p>
          </div>
        </form>
        <p><br /><br />NOTE: All fields are required.Please do not leave any empty or misfilled that could generate a delay to your registration process</p>