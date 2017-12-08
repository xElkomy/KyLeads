<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Sitespanel extends CI_Migration {

    public function up()
    {

        //add "sitethumb" column to Sites table
        $fields = array(
            'sitethumb' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            )
        );

        $this->dbforge->add_column('sites', $fields);

    }

    public function down()
    {
        $this->dbforge->drop_column('sites', 'sitethumb');
    }
}