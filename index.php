<title>Escape Time Fractals</title>
<link rel="shortcut icon" href="http://localhost/PHP-Fractals/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Cabin+Sketch:bold&v1' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Jura&v1' rel='stylesheet' type='text/css'>
<h1 style=" font-size: 50px; font-family: 'Cabin Sketch', arial, serif;">Escape Time Fractals</h1>
<?php

$pages = array(
'complexNumber.php',
'KochCurve.png',
'squareAndAdd.php',
'mandlebrot_simplest.php',
'1978-mandlebrot.png',
'mandlebrot_terminal.php?zoom=0.5',
'mandlebrot.png',
'mandlebrot.php',
'frames/mandlebrot.mp4',
'escapeTime.php',
'palette.php',
'paletteLinearDemo.png',
'paletteLinearDemo.php',
'paletteDemo.png',
'paletteDemo.php',
'mandlebrot_linear.png',
'Benoit_Mandelbrot.jpg',
'gaston-julia.jpg',
'julia_simplest.php',
'julia.php',
'julia.mp4',
'burningShip.php',
);

?>

<ul style="font-family: 'Jura', arial, serif; font-size: 20px; ">
<?php

foreach ($pages as $page) {
	if (false === strpos($page, '?')) {
		$withoutQueryString = $page;
	} else {
		$withoutQueryString = substr($page, 0, strpos($page, '?'));
	}
	if (preg_match('/\.php/',$page)) {
		printf('<li style="padding-bottom: 8px;"><a href="%s">%s</a> <a href="show_code.php?file=%s">show code</a></li>',
			$page,
			$page,
			$withoutQueryString
			);
	} else {
		printf('<li style="padding-bottom: 8px;"><a href="%s">%s</a></li>',
		$page,
		$page
		);
	}
}
?>
</ul>
