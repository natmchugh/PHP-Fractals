<?php

class ComplexNumberPHP {

	private $_r;
	private $_i;

	public function __construct($real, $imaginary) {
		$this->_r = $real;
		$this->_i = $imaginary;
	}

	// just add the real and imaginary components
	// (a+bi) + (c+di) = (a + c) + (b + d)i
	public function add(ComplexNumberPHP $number) {
		$real = $this->_r + $number->_r;
		$imaginary = $this->_i + $number->_i;
		$this->_r = $real;
		$this->_i = $imaginary;
		return $this;
	}

	// just subtract the real and imaginary components
	// (a+bi) - (c+di) = (a - c) + (b - d)i
	public function subtract(ComplexNumberPHP $number) {
		$real = $this->_r - $number->_r;
		$imaginary = $this->_i - $number->_i;
		$this->_r = $real;
		$this->_i = $imaginary;
		return $this;
	}
	
	public function multiplyBy(ComplexNumberPHP $number) {
//	    (a+bi)(c+di) = (ac - bd) + (bc + ad)i
		$real = $this->_r * $number->_r - $this->_i * $number->_i;
		$imaginary = $this->_i * $number->_r + $this->_r * $number->_i;
		$this->_r = $real;
		$this->_i = $imaginary;
		return $this;
	}

	public function divideBy(ComplexNumberPHP $number) {
//	    (a+bi)/(c+di) = (ac+bd+i(bc-ad))/(c^2+d^2)
		$numerator = pow($number->_r, 2) + pow($number->_i , 2);
		$real = ($this->_r * $number->_r + $this->_i * $number->_i) / $numerator;
		$imaginary = ($this->_i * $number->_r - $this->_r * $number->_i) / $numerator;
		$this->_r = $real;
		$this->_i = $imaginary;
		return $this;
	}

	public function square() {
// When we square a complex number in the form a+bi:
// New real component: a^2-b^2
// New imaginary component: 2*a*b
		$real = $this->_r * $this->_r - $this->_i * $this->_i;
		$imaginary = 2 * $this->_r * $this->_i;
		$this->_r = $real;
		$this->_i = $imaginary;
		return $this;
	}

	public function greaterThanTwo() {
//		i.e. is length on argand diagram longer than two
//		use pythagoras a^2 + b^2 = c^2
		return pow($this->_r, 2) + pow($this->_i, 2) > 4;
	}

	public function lessThanTwo() {
		return!$this->greaterThanTwo();
	}

}