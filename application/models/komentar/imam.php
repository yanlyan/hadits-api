<?php namespace Model\Komentar;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Imam extends ORM {
	
	function _init()
	{
		self::$fields = array(
			'Kode_Rawi' => ORM::field('int[6]'),
			'Ulama' => ORM::field('char[80]'),
			'Koment' => ORM::field('string'),
		);

	}
}