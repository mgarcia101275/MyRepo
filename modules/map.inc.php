<?php

//include connection string

$dbc = mysqli_connect('localhost','mano','Gaman2003','zips') or die (mysqli_error());

if(isset($_GET['zip'])){
	$zip = $_GET['zip'];
	
	$q = "SELECT city,state,latitude,longitude FROM zip_codes WHERE zip_code =". $zip;
	
	$r = mysqli_query($dbc,$q);
	
	while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
		
		$lat = $row['latitude'];
		$lon = $row['longitude'];
		$tit = $row['city'] . " , ". $row['state'];
		
	}//End of while loop.
	
	mysqli_free_result($r);
	mysqli_close($dbc);
	
	echo 'This is the latitud '.$lat.' and longitude'.$lon.' of '.$tit;
	
}//End of isset $_GET['zip'] IF.

//threating with the google api for mapping the coords:
?>
<input type="hidden" value="<?php echo $lat;?>" name="lat">
<input type="hidden" value="<?php echo $lon;?>" name="lon">
<input type="hidden" value="<?php echo $tit;?>" name="title">

<div id="map"></div>
