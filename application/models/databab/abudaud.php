<?php namespace Model\Databab;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Abudaud extends ORM {

	public $primary_key = 'ID_Bab';
	public $foreign_key = array('\\model\\datakitab\\abudaud' => 'ID_Kitab', '\\model\\databab\\abudaud' => 'ID_Kitab');

	function _init()
	{
        self::$relationships = array (
            'kitab'          =>     ORM::belongs_to('\\Model\\Datakitab\\Abudaud'),
        );

		self::$fields = array(
			'ID_Kitab' => ORM::field('int[11]'),
			'ID_Bab' => ORM::field('int[11]'),
			'Bab_Indonesia' => ORM::field('string'),
			'Bab_Arab' => ORM::field('string'),
		);

	}
}