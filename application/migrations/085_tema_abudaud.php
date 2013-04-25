<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_tema_abudaud extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'NoHdt' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'Tema_Indonesia' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'Tema_Arab' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'ID_Kitab' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'ID_Bab' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
		));

		$this->dbforge->create_table('tema_abudaud', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('tema_abudaud');
	}
}