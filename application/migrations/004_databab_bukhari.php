<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_databab_bukhari extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'ID_Kitab' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'ID_Bab' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'Bab_Indonesia' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'Bab_Arab' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
		));

		$this->dbforge->create_table('databab_bukhari', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('databab_bukhari');
	}
}