<?php namespace Model\Had;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Ibnumajah extends ORM {
	
	function _init()
	{
		self::$relationships = array (
            'tema'			=>     ORM::has_many('\\Model\\Tema\\Ibnumajah'),
        );
		self::$fields = array(
			'NoHdt' => ORM::field('int[11]'),
			'Isi_Arab' => ORM::field('string'),
			'Isi_Indonesia' => ORM::field('string'),
			'Isi_Arab_Gundul' => ORM::field('string'),
		);

	}
}