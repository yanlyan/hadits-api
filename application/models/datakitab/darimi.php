<?php namespace Model\Datakitab;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Darimi extends ORM {
	public $primary_key = 'ID_Kitab';
	function _init()
	{
		self::$relationships = array (
            'bab'          =>     ORM::has_many('\\Model\\Databab\\Darimi'),
            'tema'			=>     ORM::has_many('\\Model\\Tema\\Darimi')
        );
		self::$fields = array(
			'ID_Kitab' => ORM::field('int[11]'),
			'Kitab_Indonesia' => ORM::field('char[255]'),
			'Kitab_Arab' => ORM::field('char[255]'),
		);

	}
}