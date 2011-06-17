<?php

if (isset($_POST)) {
	$complexNumber = new ComplexNumber((int) $_POST['real'], (int) $_POST['imaginary']);
	$complexNumber->square();
	$addcomplexNumber = new ComplexNumber((int) $_POST['add_real'], (int) $_POST['add_imaginary']);
	$complexNumber->add($addcomplexNumber);
	$results = unserialize($_POST['results']);
	$results[] = array($complexNumber->real, $complexNumber->imaginary);
} else {
	$results = array();
}

?>
<form action="#" method="POST">
<fieldset>
	Square: <input type="text" name="real" value="<?php if(isset($complexNumber)) { echo $complexNumber->real; } ?>" /> +
	<input type="text" name="imaginary" value="<?php if(isset($complexNumber)) { echo $complexNumber->imaginary; } ?>" /> i<br/>
	Add: <input type="text" name="add_real" value="<?php if(isset($_POST['add_real'])) { echo $_POST['add_real']; } ?>" /> +  
	<input type="text" name="add_imaginary" value="<?php echo $_POST['add_imaginary'] ?>"/> i<br/>
	<input type="hidden" name="results" value="<?php echo serialize($results); ?>" />
	<input type="submit" value="Square and Add" />
	= <?php if(isset($complexNumber)) { echo $complexNumber->real; } ?> + <?php if(isset($complexNumber)) { echo $complexNumber->imaginary; } ?> i
</fieldset>
</form>
<?php

	foreach ($results as $complex) {
		echo " {$complex[0]} + {$complex[1]} i <br/>";
	}


?>
