<?php

class Pallette implements ArrayAccess{

	static	private $_cache;
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
        return $offset < $this->_maxIterations || 'inside' == $offset;
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
	    } else {
		$green = 255 * ($offset+100) / ($this->_maxIterations);
		$boost = log10(($offset-1)*10/$this->_maxIterations) * 50;
		$return = imagecolorallocate($this->_image, 255, $green + $boost, 20);
	    }
	self::$_cache[$offset] = $return;
	return $return;

    }

}