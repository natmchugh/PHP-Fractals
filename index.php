<title>Escape Time Fractals</title>
<link rel="shortcut icon" href="http://localhost/PHP-Fractals/favicon.ico" />
<h1>Escape Time Fractals</h1>
<?php

$pages = array(
'complexNumber.php',
'mandlebrot_simplest.php',
'1978-mandlebrot.png',
'mandlebrot_terminal.php?zoom=0.5',
'mandlebrot.php',
'gaston-julia.jpg',
'julia_simplest.php',
'julia.php',
'julia.mp4',
'burningShip.php',
);

?>

<ul>
<?php

foreach ($pages as $page) {
	if (false === strpos($page, '?')) {
		$withoutQueryString = $page;
	} else {
		$withoutQueryString = substr($page, 0, strpos($page, '?'));
	}
	if (preg_match('/\.php/',$page)) {
		printf('<li><a href="%s">%s</a> <a href="show_code.php?file=%s">show code</a></li>',
			$page,
			$page,
			$withoutQueryString
			);
	} else {
		printf('<li><a href="%s">%s</a></li>',
		$page,
		$page
		);
	}
}
?>
</ul>
