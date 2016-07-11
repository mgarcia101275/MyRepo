<?php
require'includes\connection.php';

/*check if exist a $_SESSION[user_name] and the $_SESSION[user_type] =='admin' or 
 * $_SESSION[user_type] == 'faculty'. if exist create a $_SESSION[id] 
 * to identify who is working on and load all the stuff that have his id else send it back to index.php.*/

//select class from database
$myq = "select class_id from test.class where user_id ='". $_SESSION["user_id"]."'";

$rmyq = mysqli_query($myq,$dbc);

//select chapters from database depending of class_id selected;

$cq = 'select from test.chapters where class_id = $class_id';

$rcq = mysqli_query($myq,$dbc);

//select and show all the questions for that class_id

$qq = 'select from test.questions where class_id = $class_id';

$rqq = mysqli_query($myq,$dbc);

//process the request send by the professor with the the selected questions for the test.

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	//update all the fields that are checked and set 1 into database for those.
	
	
}

echo "<form action=\"index.php?p=setit\" method=\"POST\" name=\"settest\" >";
echo "</form>";
?>