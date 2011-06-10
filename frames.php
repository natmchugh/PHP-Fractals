<?php
include('mandlebrot.php');
$i = $argv[1];
$size = array(500, 500);
$i2 = $i * $i;
$limits = array(-1/$i2, 0/$i2, -1/$i2, 1/$i2);
$frac = new Mandlebrot($limits, $size, 200);
$frac->generateImage('mandlebrot-'.$i.'.png', array(-1.31, 0));