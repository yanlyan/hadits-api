<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_sanad_ibnumajah extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'NoHdt' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'NoUrut' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J1' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J2' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J3' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J4' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J5' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J6' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J7' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J8' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J9' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'J10' => array(
				'type' => 'INT',
				'constraint' => 6,
			),
			'Skema' => array(
				'type' => 'VARCHAR',
				'constraint' => 30,
			),
			'Kedudukan' => array(
				'type' => 'VARCHAR',
				'constraint' => 40,
			),
		));

		$this->dbforge->create_table('sanad_ibnumajah', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('sanad_ibnumajah');
	}
}