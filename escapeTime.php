<?php
include('pallete.php');

class EscapeTime {
	protected $_minX;
	protected $_maxX;
	protected $_minY;
	protected $_maxY;

	protected $_imageWidth;
	protected $_imageHeight;
	protected $_showScale;

	protected $_maxIterations;

	public function  __construct(Array $limits,Array $size, $maximumIterations = 200, $showScale = false) {
		list($this->_minX, $this->_maxX, $this->_minY, $this->_maxY) = $limits;
		list($this->_imageWidth, $this->_imageHeight) = $size;

		$this->_maxIterations = $maximumIterations;
	}

	public function  __destruct() {
	imagedestroy($this->_image);
	 unset($this->_image);
	 unset($this->_colours);
	}

	public function setUpImage() {
		$this->_image = imagecreate($this->_imageWidth, $this->_imageHeight);

		// Load the palette to find colours
		$this->_colours = new Pallette($this->_maxIterations, $this->_image);
	}

	public function zoom($factor) {
		$this->_minX = $this->_minX / $factor;
		$this->_minY = $this->_minY / $factor;
		$this->_maxX = $this->_maxX / $factor;
		$this->_maxY = $this->_maxY / $factor;
	}

	public function pan($offset) {
		$this->_minX = $this->_minX + $offset;
		$this->_minY = $this->_minY + $offset;
		$this->_maxX = $this->_maxX + $offset;
		$this->_maxY = $this->_maxY + $offset;
	}
}


@apache_setenv('no-gzip', 1);
@ini_set('zlib.output_compression', 0);
@ini_set('implicit_flush', 1);
for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
ob_implicit_flush(1);
