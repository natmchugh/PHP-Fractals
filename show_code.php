<?php
ini_set('include_path', '/Users/nathanielmchugh/nmdev/geshi');
require('geshi.php');

$filename = $_GET['file'];
$source = file_get_contents(__DIR__.'/'.$filename);

$language = 'php';
//
$geshi = new GeSHi($source, $language);
$geshi->enable_classes();
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
echo '<html>
<head><title>Code</title>
<style type="text/css">
<!--';
echo $geshi->get_stylesheet();
echo '-->
</style></head>
<body>';
echo $geshi->parse_code();
echo '</body>';