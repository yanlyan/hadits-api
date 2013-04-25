<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_kumpulan_mursal extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'NoUrut' => array(
				'type' => 'INT',
				'constraint' => 8,
			),
			'Sumber' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
			'NoHdt' => array(
				'type' => 'INT',
				'constraint' => 8,
			),
		));

		$this->dbforge->create_table('kumpulan_mursal', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('kumpulan_mursal');
	}
}