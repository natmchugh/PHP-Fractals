<?php
include('escapeTime.php');

class Julia extends EscapeTime{


	public function generateImage($filename = 'julia.png', Array $constant) {
		$juliaReal = $constant[0];
		$juliaImag = $constant[1];
		
		$this->setUpImage();
		for ($i=0; $i<$this->_imageWidth; $i++) {
			for ($j=0; $j<$this->_imageHeight; $j++) {
				// What values of x and y does this pixel represent?
				$x = $this->_minX+$i*(($this->_maxX - $this->_minX) / ($this->_imageHeight-1));
				$y = $this->_minY+$j*(($this->_maxY - $this->_minY) / ($this->_imageHeight-1));

				// C=x+yi

				$iteration = 0;
				$z = array(0,0); // The initial value of z is 0+0i
				$magnitude = 0;

				// Optimization: Store x^2 and y^2 so we don't have to keep calculating it
				$x2 = 0;
				$y2 = 0;

				// If the |z| > 2 ever, then the sequence will tend to infinity so we can exit the loop
				while ($x2+$y2 < 4 && $iteration <= $this->_maxIterations ) {
// did try and do this within a beutiful class for Complex numbers but number of functional calls
// quickly becomes too large array arithmatic seems quickest way
				    $newX = $x*$x - $y*$y + $juliaReal;
				    $newY = 2*$x*$y + $juliaImag;

				    $x2 = $newX * $newX;
				    $y2 = $newY * $newY;

				    $x = $newX;
				    $y = $newY;
				    ++$iteration;
				}
				$its[] = $iteration;
				if ($iteration >= $this->_maxIterations) {
				    imagesetpixel($this->_image, $i, $j, $this->_colours['inside']);
				} else {
				    imagesetpixel($this->_image, $i, $j, $this->_colours[$iteration]);
				}


			    }
		}
		imagepng($this->_image, $filename);
	}

}
$size = array(500, 500);
$limits = array(-1.5, 0.5, -1, 1);
$frac = new Julia($limits, $size, 200);
$frac->generateImage('julia.png', array(0.285, 0.01));