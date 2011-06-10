<?php

$maxIterations = 50;
$step = 1/20;
$topLeft = array(-1.5, 1);
$bottomRight = array(0.5, -1);

if ('cli' != php_sapi_name()) {
	echo "<pre><center>";
}
$c = new ComplexNumber(-0.70176, -0.3842);//-0.8, 0.156);
for ($imaginary = $topLeft[1]; $imaginary > $bottomRight[1]; $imaginary = $imaginary - $step) {
	for ($real = $topLeft[0] ; $real < $bottomRight[0]; $real = $real + $step) {
		$z = new ComplexNumber($real, $imaginary);
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