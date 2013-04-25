<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_ind_5 extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'No' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'Sumber' => array(
				'type' => 'VARCHAR',
				'constraint' => 12,
			),
			'NoHdt' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
		));

		$this->dbforge->create_table('ind_5', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('ind_5');
	}
}