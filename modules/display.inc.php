<?php # Script 3.4 - display.php
if($_SERVER['REQUEST_METHOD']=='POST'){
 
//Errors handler
$errors = array();
	
// Abbreviation of state to show:
$state = $_POST['state'];

// Items to display per row:
$items = 5;



// Print a caption:
echo "<h1>Cities and Zip Codes found in $state</h1>";

// Connect to the database:
$dbc = mysqli_connect ('localhost', 'mano', 'Gaman2003', 'zips');

// Get the cities and zip codes, ordered by city:
$q = "SELECT city, zip_code FROM zip_codes WHERE state='$state' ORDER BY city";
$r = mysqli_query($dbc, $q);

if(is_string($_POST['state'])){
	
	if (mysqli_affected_rows($dbc) == 0){
	$errors[] = "An invalid State has been wrote";
}
} else {

	$errors[]="You must write just letters";
	
}
	
	


if(empty($errors)){
	
// Retrieve the results:
if (mysqli_num_rows($r) > 0) {

    // Start a table:
    echo '<table border="2" width="90%" cellspacing="3" cellpadding="3" align="center">';

    // Need a counter:
    $i = 0;

    // Retrieve each record:
    while (list($city, $zip_code) = mysqli_fetch_array($r, MYSQLI_NUM)) {
    
        // Do we need to start a new row?
        if ($i == 0) {
            echo '<tr>';
        }
    
        // Print the record:
        echo "<td align=\"center\">$city,<br/><a href=\"index.php?p=map&zip=$zip_code\">$zip_code</a></td>";
        
        // Increment the counter:
        $i++;
        
        // Do we need to end the row?
        if ($i == $items) {
            echo '</tr>';
            $i = 0; // Reset counter.
        }

    } // End of while loop.
    
    if ($i > 0) { // Last row was incomplete.

        // Print the necessary number of cells:
        for (;$i < $items; $i++) {
            echo "<td>&nbsp;</td>\n";
        }
    
        // Complete the row.
        echo '</tr>';
    
    } // End of ($i > 0) IF.
    
    // Close the table:
    echo '</table>';
    
 }//end num rows if
 
// Close the database connection:
mysqli_close($dbc);

} else {
	
	foreach ($errors as $msg){
		echo '<p class="error">'.$msg.'</p><br>';
	}
	
}//end of empty errors

}//end of server request

?><form action="index.php?p=city" method="post">
<p>Enter State Abreviation</p><input type="text" name="state" value="FL"/>
<input type="submit" name="sendAbr" value="Write it"/>
</form>