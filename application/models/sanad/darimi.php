<?php namespace Model\Sanad;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Darimi extends ORM {
	
	function _init()
	{
		self::$fields = array(
			'NoHdt' => ORM::field('int[6]'),
			'NoUrut' => ORM::field('int[6]'),
			'J1' => ORM::field('int[6]'),
			'J2' => ORM::field('int[6]'),
			'J3' => ORM::field('int[6]'),
			'J4' => ORM::field('int[6]'),
			'J5' => ORM::field('int[6]'),
			'J6' => ORM::field('int[6]'),
			'J7' => ORM::field('int[6]'),
			'J8' => ORM::field('int[6]'),
			'J9' => ORM::field('int[6]'),
			'J10' => ORM::field('int[6]'),
			'Skema' => ORM::field('char[30]'),
			'Kedudukan' => ORM::field('char[40]'),
		);

	}
}