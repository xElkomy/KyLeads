<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Imagelocation extends CI_Migration {

    public function up()
    {

        //change image storage settings
        $this->db->query("UPDATE `apps_settings` SET `value` = 'images' WHERE id = 2");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'images' WHERE id = 2");
        $this->db->query("UPDATE `apps_settings` SET `value` = 'images/uploads' WHERE id = 3");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'images/uploads' WHERE id = 3");
        $this->db->query("UPDATE `apps_settings` SET `value` = 'elements/bundles|elements/css|images' WHERE id = 9");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'elements/bundles|elements/css|images' WHERE id = 9");

    }

    public function down()
    {
        $this->db->query("UPDATE `apps_settings` SET `value` = 'elements' WHERE id = 2");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'elements' WHERE id = 2");
        $this->db->query("UPDATE `apps_settings` SET `value` = 'elements/images/uploads' WHERE id = 3");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'elements/images/uploads' WHERE id = 3");
    }
}