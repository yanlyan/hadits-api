<?php namespace Model\Ind;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class 4 extends ORM {
	
	function _init()
	{
		self::$fields = array(
			'No' => ORM::field('int[11]'),
			'Sumber' => ORM::field('char[12]'),
			'NoHdt' => ORM::field('int[11]'),
		);

	}
}