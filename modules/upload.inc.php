<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	echo "<br/>";
	print_r($_FILES);	
}

?>
<h2>Gallery - Picture Upload System</h2>
<form id="fupload" name="fupload" class="form_settings" action ="index.php?p=upload" method ="post" enctype="multipart/form-data">
<p>Pick the picture:<input name="iloaded" type="file"></p>
<p>Description<input name="idesc" type="text"></p>
<input name="isend" type="submit" value="Upload">
</form>