<section class="tabs">
<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked>
<label for="tab-1" class="tab-label-1">Chp1</label>
<?php 
require 'ex.php';
$c = new RWFile();

for($i=2;$i<9;$i++){
 echo "<input id=\"tab-$i\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-$i\">";
 echo "<label for=\"tab-$i\" class=\"tab-label-$i\" alt=\"Chapter $i\">Chp$i</label>";
}

?>
<div class="clear-shadow"></div>
<div class="content"><?php for($n=1;$n<9;$n++){ 
	                echo "<div class=\"content-$n\">";
						 $c->read('./chapters/chp'.$n.'.txt','r'); 
					echo "</div>";}
					?>
</div>

</section>
<?php unset($c);?>

