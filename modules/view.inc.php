<?php

if(isset($_SESSION['usertype']) && ($_SESSION['usertype']=='admin')){
//Include a connection file
include('includes/connection.php');

$display = 1;

if(isset($_GET['page']) && is_numeric($_GET['page'])){
	
	$pages = $_GET['page'];
	
} else {
	
	$q = "SELECT COUNT(data_id) FROM users_data";
	$r = @mysqli_query($dbc,$q);
	$row = @mysqli_fetch_array($r,MYSQLI_NUM);
	$records = $row[0];
	
	
	//Calculate the number of pages
	if($records > $display){//More than 1 page
		
		$pages = ceil($records/$display); 
		
	} else { $pages = 1; }
	
}//End of page IF

if(isset($_GET['start']) && is_numeric($_GET['start'])){
	
	$start = $_GET['start'];
	
} else {
	
	$start=0;
	
}

//Create a query:
$q = "SELECT fname,lname,address,number,zip_code,city,state, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users_data
ORDER BY registration_date ASC LIMIT $start, $display";

$r = @mysqli_query ($dbc, $q);

// Table header:
echo '<table align="center" cellspacing="0" cellpadding="5" width="100%">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Address</b></td>
	<td align="left"><b>No #</b></td>
	<td align="left"><b>Zip Code</b></td>
	<td align="left"><b>City</b></td>
	<td align="left"><b>State</b></td>
	<td align="left"><b>Date Registered</b></td></tr>';

//Fetch and print all records:

	
	



while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
	
			echo '<tr>
			<td align="left"><a href="index.php?p=update&id=' . $row['user_id'] . '">Edit</a></td>
			<td align="left"><a href="index.php?p=delete&id=' . $row['user_id'] . '">Delete</a></td>
			<td align="left">' . $row['lname'] . '</td>
		    <td align="left">' . $row['fname'] . '</td>
		    <td align="left">' . $row['address'] . '</td>
		    <td align="left">' . $row['number'] . '</td>
		    <td align="left">' . $row['zip_code'] . '</td>
		    <td align="left">' . $row['city'] . '</td>
		    <td align="left">' . $row['state'] . '</td>
			<td align="left">' . $row['dr'] . '</td>
		</tr>';
	
 } // End of WHILE loop.
 
 echo '</table>';
 mysqli_free_result($r);
 mysqli_close($dbc);
 
 //Make links to other pages if needed.
 
 if($pages > 1) {
 	
 	//Add some spacing and start a paragraph.

 	echo '<br/><p>';
 	
 	//Determine the page that script is
 	
 	$current_page = ($start/$display) + 1;
 	
 	//If not the the first page, make a previous link.
 	
 	if($current_page != 1){ echo '<a href="index.php?p=view&start='.($start - $display).'&page='.$pages.'">Previous</a>';}
 
 	//Make all the numbered pages:
 	
 	for($i=1;$i<=$pages;$i++){
 		
 		if($i != $current_page) { 
 			
 			echo '<a href="index.php?p=view&start='.(($display * ($i-1))).'&page='.$pages.'">'.$i.'</a>';
 		
 		} else {
 			
 			echo $i.' ';
 		}
 	}//End of for loop.
 	
 	//If is not the last page:
 	
 	if($current_page != $pages){
 		
 		echo '<a href="index.php?p=view&start='.($start + $display).'&page='.$pages.'">Next</a>';
 	}
 	
 	echo '</p>';
 }//End of links session.
 
} else {
	
	include('includes/functions.inc.php');
	
	redirect_user('index.php');
}
?>
