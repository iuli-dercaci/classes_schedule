<?php

namespace Scheduler;

class Registry implements ArrayAccess {
{
	
	private $registry = array();
	private static $instance = null;
	
	public static function getInstance()
	{
	    if(self::$instance === null) {
	    	self::$instance = new Registry();
	    }
	 
	    return self::$instance;
    }

	/*public function set($key, $value)
	{
		if (isset($this->registry[$key])) {
			throw new Exception("There is already an entry for key " . $key);
		}
        $this->registry[$key] = $value;
    }

	public function get($key)
	{
		if (!isset($this->registry[$key])) {
			throw new Exception("There is no entry for key " . $key);
		}

		return $this->registry[$key];
	}*/

	public offsetExists($key)
	{
		return isset($this->registry[$key]);
	}

	public offsetGet ($key)
	{
		if(isset($this->registry[$key])) {
			return $this->registry[$key];
		}

		return null;
	}

	public offsetSet ($key, $value)
	{
		return $this->registry[$key] = $value;
	}

	public offsetUnset ($key)
	{
		return unset($this->registry[$key]);
	}

	private function __construct() {}

	private function __clone() {}
}