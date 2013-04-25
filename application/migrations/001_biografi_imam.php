<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* This basic migration has been auto-generated by the Gas ORM */

class Migration_biografi_imam extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'bioId' => array(
				'type' => 'INT',
				'constraint' => 10,
			),
			'bioImam' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'bioImamFull' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'bioContent' => array(
				'type' => 'TEXT',
				'constraint' => 0,
			),
		));

		$this->dbforge->add_key('bioId', TRUE);

		$this->dbforge->create_table('biografi_imam', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('biografi_imam');
	}
}