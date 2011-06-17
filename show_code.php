<?php
ini_set('include_path', '/Users/nathanielmchugh/nmdev/geshi');
require('geshi.php');

$filename = $_GET['file'];
$source = file_get_contents(__DIR__.'/'.$filename);

$language = 'php';
//
$geshi = new GeSHi($source, $language);
$geshi->enable_classes();
$geshi->set_overall_style('background-color: #ffffee;', true);
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 0);
echo '<html>
<head><title>Code</title>
<style type="text/css">
<!--';
// Echo out the stylesheet for this code block
echo $geshi->get_stylesheet();

// And continue echoing the page

echo '-->
	</style>
</head>
<body>';
echo $geshi->parse_code();
echo '</body>';