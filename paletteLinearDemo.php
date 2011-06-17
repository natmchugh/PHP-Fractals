<?php
include('escapeTime.php');
include('paletteLinear.php');

class paletteLinearDemo extends EscapeTime{

	public function  __construct($size) {
		list($this->_imageWidth, $this->_imageHeight) = $size;
		$this->_maxIterations = 200;
	}

	public function setUpImage() {
		$this->_image = imagecreate($this->_imageWidth, $this->_imageHeight);

		// Load the palette to find colours
		$this->_colours = new PaletteLinear($this->_maxIterations, $this->_image);
	}

	public function generateImage($filename = 'paletteLinearDemo.png') {
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
$frac = new paletteLinearDemo($size);
$frac->generateImage();