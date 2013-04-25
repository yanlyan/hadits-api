<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_had_bukhari extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'NoHdt' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'Isi_Arab' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'Isi_Indonesia' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
			'Isi_Arab_Gundul' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
		));

		$this->dbforge->create_table('had_bukhari', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('had_bukhari');
	}
}