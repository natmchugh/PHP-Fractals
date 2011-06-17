<?php
include('mandlebrot.php');
$i = $argv[1];
$size = array(500, 500);
$i2 = $i * $i;
$limits = array(-1.5 /$i2, 0.5/$i2, -1 /$i2, 1 /$i2);
$frac = new Mandlebrot($limits, $size, 200);
$frac->centre(-0.70176, -0.3842);
$file = $frac->generateImage('frames/mandlebrot-'.$i.'.png');
var_dump($file);