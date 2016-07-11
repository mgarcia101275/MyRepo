<?php
//require the connection to the database.
require"includes\connection.php";

//check that the REQUEST_METHOD was sent
if($_SERVER['REQUEST_METHOD']=="POST"){
	var_dump($_POST);
	
//process the request done through the while and insert it into test.answers including the class_id, test_id and user_id that come from $_SESSION['user_id'];

}

$date = date('m d Y');

$myq='select from test.class where tdate = $date';

$q = mysqli_query($myq,$dbc);

if($myq){
	
	while($fila = mysqli_fetch_array($myq,ASSOC)){ $class_id = $fila['class_id']; }
	
	$tq = 'select idq, question, a_a, a_b, a_c, a_d, class_id, chapter_id from test.questions where class_id = $class_id and active = 1 order by chapter_id ASC';
	
	$rtq = mysqli_query($tq);

echo "<form action=\"index.php?p=takeit\" method=\"POST\" name id=\"\">";

 while($row = mysqli_fetch_array($rtq,MYSQLI_ASSOC)){
 	
    echo "<h3>".$row['question']."</h3>";
 	echo "<input type=\"radio\" name='".$row['idq']."' value=\"a_a\"><span>".$row['a_a']."</span>";
 	echo "<input type=\"radio\" name='".$row['idq']."' value=\"a_b\"><span>".$row['a_b']."</span>";
 	echo "<input type=\"radio\" name='".$row['idq']."' value=\"a_c\"><span>".$row['a_c']."</span>";
 	echo "<input type=\"radio\" name='".$row['idq']."' value=\"a_d\"><span>".$row['a_d']."</span>";
 }
 echo "<input type=\"submit\" name=\"mytest\" value=\"Send Test\">";
 echo "</form>";

} else {
	echo " <h1>Error: There is none test to take today.</h1>";
}