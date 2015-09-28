<?php
/**
 * @author Iuli Dercaci <iuli.dercaci@gmail.com>
 */
 namespace Scheduler\Model;
 
 abstract class Repository
 {
 	protected $db;

 	function __construct($db)
 	{
 		$this->db = $db;
 	}
 }