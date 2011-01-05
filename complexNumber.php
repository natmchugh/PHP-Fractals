<?php
class ComplexNumber {

	private $_real;
	private $_imaginary;

	public function  __construct($real, $imaginary) {
	 	$this->_real = $real;
		$this->_imaginary = $imaginary;
	}


	public function multiplyBy(ComplexNumber $number) {
//	    (a+bi)(c+di) = (ac - bd) + (bc + ad)i
	      $real = $this->_real * $number->_real - $this->_imaginary * $number->_imaginary;
	      $imaginary = $this->_imaginary * $number->_real + $this->_real * $number->_imaginary;
	      $this->_real = $real;
	      $this->_imaginary = $imaginary;
	      return $this;

	}

	public function square() {
		      // When we square a complex number in the form x+yi:
	      // New real component: x^2-y^2
	      // New imaginary component: 2*real*imaginary
	      $real = $this->_real * $this->_real - $this->_imaginary * $this->_imaginary;
	      $imaginary = 2 * $this->_real * $this->_imaginary;
	      $this->_real = $real;
	      $this->_imaginary = $imaginary;
	      return $this;
	}

	public function greaterThanTwo() {
		return abs($this->_real) + abs($this->_imaginary) > 2;
	}

	public function add($r, $i) {
		$real =  $this->_real + $r ;
		$imaginary = $this->_imaginary + $i;
		$this->_real = $real;
	      	$this->_imaginary = $imaginary;
	      	return $this;
	}
}