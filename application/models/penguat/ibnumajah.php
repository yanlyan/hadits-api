<?php namespace Model\Penguat;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Ibnumajah extends ORM {
	
	function _init()
	{
		self::$fields = array(
			'NoUrut' => ORM::field('int[6]'),
			'NoHdt' => ORM::field('int[6]'),
			'Nama' => ORM::field('char[40]'),
			'NoBanding' => ORM::field('int[6]'),
		);

	}
}