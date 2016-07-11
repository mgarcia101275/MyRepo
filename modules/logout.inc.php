<?php
include('includes/functions.inc.php');

session_destroy();

$_SESSION = array();

?>
<div class="">
<h2>Warning:</h2><p>You has beeen desconnected from our server</p>
</div>
<?php 

redirect_user("index.php");

?>