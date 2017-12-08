<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Packageimprovements extends CI_Migration {

    public function up()
    {
        //add "export_site" column to Sites table
        $fields = array(
            'export_site' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => 'no',
                'null' => FALSE,
                'after' => 'hosting_option'
            ),
            'disk_space' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 0,
                'null' => FALSE,
                'after' => 'export_site'
            ),
            'templates' => array(
                'type' => 'TEXT',
                'constraint' => 100,
                'after' => 'disk_space'
            )
        );

        $this->dbforge->add_column('packages', $fields);

    }

    public function down()
    {
        $this->dbforge->drop_column('packages', 'export_site');
        $this->dbforge->drop_column('packages', 'disk_space');
        $this->dbforge->drop_column('packages', 'templates');
    }
}