<?php namespace Model\Tema;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Abudaud extends ORM {
	
	function _init()
	{
		self::$fields = array(
			'NoHdt' => ORM::field('int[11]'),
			'Tema_Indonesia' => ORM::field('string'),
			'Tema_Arab' => ORM::field('string'),
			'ID_Kitab' => ORM::field('int[11]'),
			'ID_Bab' => ORM::field('int[11]'),
		);

	}
}