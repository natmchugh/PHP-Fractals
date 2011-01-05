<?php
include('pallete.php');

class EscapeTime {
	protected $_minX;
	protected $_maxX;
	protected $_minY;
	protected $_maxY;

	protected $_imageWidth;
	protected $_imageHeight;

	protected $_maxIterations;

	public function  __construct(Array $limits,Array $size, $maximumIterations = 200) {
		list($this->_minX, $this->_maxX, $this->_minY, $this->_maxY) =
			$limits;
		list($this->_imageWidth, $this->_imageHeight) = $size;

		$this->_maxIterations = $maximumIterations;
	}

	protected function setUpImage() {
		$this->_image = imagecreate($this->_imageWidth, $this->_imageHeight);

		// Load the palette to find colours
		$this->_colours = new Pallette($this->_maxIterations, $this->_image);
	}
}