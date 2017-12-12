<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Templatethumbs extends CI_Migration {

    public function up()
    {

        //add "sitethumb" column to Sites table
        $fields = array(
            'pagethumb' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => ''
            )
        );

        $this->dbforge->add_column('pages', $fields);

    }

    public function down()
    {
        $this->dbforge->drop_column('pages', 'pagethumb');
    }
}