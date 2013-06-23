<?php namespace Model\Databab;

/* This basic model has been auto-generated by the Gas ORM */

use \Gas\Core;
use \Gas\ORM;

class Ibnumajah extends ORM {
	public $foreign_key = array('\\model\\datakitab\\ibnumajah' => 'ID_Kitab');
	public $primary_key = 'ID_Bab';
	function _init()
	{
		self::$relationships = array (
            'kitab'          =>     ORM::belongs_to('\\Model\\Datakitab\\Ibnumajah'),
        );
		self::$fields = array(
			'ID_Kitab' => ORM::field('int[11]'),
			'ID_Bab' => ORM::field('int[11]'),
			'Bab_Indonesia' => ORM::field('string'),
			'Bab_Arab' => ORM::field('string'),
		);

	}
}