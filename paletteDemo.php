<?php
include('escapeTime.php');

class paletteDemo extends EscapeTime{

	public function  __construct($size) {
		list($this->_imageWidth, $this->_imageHeight) = $size;
		$this->_maxIterations = 200;
	}

	public function generateImage($filename = 'paletteDemo.png') {
		$this->setUpImage();
		$count = 0;
		$total = $this->_imageWidth * $this->_imageHeight;
		for ($x=0; $x<$this->_imageWidth; $x++) {
			for ($y=0; $y<$this->_imageHeight; $y++) {
					imagesetpixel($this->_image, $x, $y, $this->_colours[$x]);
				}
		}
		imagepng($this->_image, $filename);
	}
}
$size = array(200, 50);
$frac = new palletteDemo($size);
$frac->generateImage();