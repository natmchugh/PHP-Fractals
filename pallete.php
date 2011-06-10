<?php

class Pallette implements ArrayAccess{

	static	private $_cache = array();
	private $_maxIterations;
	private $_image;

    public function  __construct($maxIterations, $image) {
		$this->_maxIterations =  $maxIterations;
		$this->_image = $image;
	}

    public function offsetSet($offset, $value) {
	return;
    }

    public function offsetExists($offset) {
        return $offset < $this->_maxIterations || 'inside' == $offset || 'scale' == $offset;
    }

    public function offsetUnset($offset) {
	    return;
    }
    
    public function offsetGet($offset) {
	    if (isset(self::$_cache[$offset])) {
	     	return self::$_cache[$offset];
	    }
	    if ('inside' == $offset) {
		$return = imagecolorallocate($this->_image, 0, 0, 0);
		} else if ('scale' == $offset) {
		$return = imagecolorallocate($this->_image, 255, 255, 255);
	    } else {
//		$green =  $offset / $this->_maxIterations *255;
		$green = log($offset, 500)/log($this->_maxIterations, 500)* 255;
		$return = imagecolorallocate($this->_image, 255, $green, 70);
	    }
	self::$_cache[$offset] = $return;
	return $return;

    }
}