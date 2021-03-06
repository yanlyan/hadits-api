<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_datakitab_tirmidzi extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'ID_Kitab' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'Kitab_Indonesia' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'Kitab_Arab' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
		));

		$this->dbforge->create_table('datakitab_tirmidzi', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('datakitab_tirmidzi');
	}
}