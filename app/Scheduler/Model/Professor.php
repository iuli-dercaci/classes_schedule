<?php
/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
 namespace Scheduler\Model;
  
 class Professor extends Model
 {
 	protected $name;

 	public function setName($name)
 	{
 		$this->name = $name;
 		return $this;
 	}

 	public function getName()
 	{
 		return $this->name;
 	}
 }