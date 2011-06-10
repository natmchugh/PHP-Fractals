<pre>
<?php
include('escapeTime.php');

class BurningShip extends EscapeTime{


	public function generateImage($filename = 'burningShip.png') {
		$this->setUpImage();
		$count = 0;
		$total = $this->_imageWidth * $this->_imageHeight;
		for ($i=0; $i<$this->_imageWidth; $i++) {
				$oldX = $x;
				$x = $this->_minX+$i*(($this->_maxX - $this->_minX) / ($this->_imageWidth-1));
			for ($j=0; $j<$this->_imageHeight; $j++) {
			$oldY = $y;
				// What values of x and y does this pixel represent?
				$y = $this->_minY+$j*(($this->_maxY - $this->_minY) / ($this->_imageHeight-1));
				if (($x * $oldX < 0) || ($y * $oldY < 0)) {
					imagesetpixel($this->_image, $i, $j, $this->_colours['scale']);
					continue 1;
				}
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
				    $z[1] = 2 * abs($z[0]) * abs($z[1]);
				    $z[0] = $x2 - $y2;


				    $z[0] = $z[0] + $x;
				    $z[1] = $z[1] + $y;

				    $x2 = $z[0] * $z[0];
				    $y2 = $z[1] * $z[1];

				    ++$iteration;
				}
					if ($iteration >= $this->_maxIterations) {
						imagesetpixel($this->_image, $i, $j, $this->_colours['inside']);
						if (0 == $count % 5) {
							echo 'X';
						}
					} else {
						imagesetpixel($this->_image, $i, $j, $this->_colours[$iteration]);
						if (0 == $count % 5) {
							echo ' ';
						}
					}
					++$count;
			    }
				echo PHP_EOL;
				ob_flush();
		}
		imagepng($this->_image, $filename);
		return $filename;
	}

}
$size = array(500, 500);
$limits = array(-2, 0.75, -1.5, 0.5);
$frac = new BurningShip($limits, $size, 200);
ob_start();
$filename = $frac->generateImage();

$modified = date('F d Y H:i:s.', filemtime($filename));
printf('<a href="%s">%s</a> %s', $filename, $filename, $modified);
ob_end_flush();
