<?php


$maxIterations = 50;
$step = 1/20;
$topLeft = array(-1.5, 1);
$bottomRight = array(0.5, -1);

if (isset($_GET['zoom'])) {

	$zoom = (float) $_GET['zoom'];
	$topLeft = zoom($topLeft,  $zoom);
	$topLeft = panLeft($topLeft, $zoom*0.25);
	$bottomRight = zoom($bottomRight, $zoom);
	$bottomRight = panLeft($bottomRight, $zoom*0.25);
	$step = $step / $zoom;
	
	echo '<head><META
     HTTP-EQUIV="Refresh"
     CONTENT="1; URL=mandlebrot_terminal.php?zoom='.($zoom+0.1).'" > </head>';
	echo '<body>';
}
if ('cli' != php_sapi_name()) {
	echo "<pre><center>";
}
for ($imaginary = $topLeft[1]; $imaginary > $bottomRight[1]; $imaginary = $imaginary - $step) {
	for ($real = $topLeft[0] ; $real < $bottomRight[0]; $real = $real + $step) {
		$z = new ComplexNumber(0,0);
		$c = new ComplexNumber($real, $imaginary);
		$iterationCount = 0;

		while ($z->lessThanTwo() && $iterationCount < $maxIterations) {
			$z->square();
			$z->add($c);

			++$iterationCount;
		}
		if ($iterationCount >= $maxIterations) {
			echo '*';
		} else {
			echo ' ';
		}
	}
	echo PHP_EOL;
}

if ('cli' != php_sapi_name()) {
	echo "</centre></pre>";
}

function zoom($coordinates, $factor) {
	$result = array();
	foreach ($coordinates as $key => $coord) {
		$result[$key] = $coord / $factor;
	}
	return $result;
}

function panLeft($coordinates, $offset) {
	$coordinates[0] = $coordinates[0] - $offset;
	return $coordinates;
}
