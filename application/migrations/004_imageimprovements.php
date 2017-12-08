<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Imageimprovements extends CI_Migration {

    public function up()
    {

        //change image settings
        $this->db->query("UPDATE `apps_settings` SET `value` = 'image/gif, image/jpg, image/png' WHERE id = 4");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'image/gif, image/jpg, image/png' WHERE id = 4");

        //no longer needed
        $this->db->query("DELETE FROM `apps_settings` WHERE id = 6");
        $this->db->query("DELETE FROM `apps_settings` WHERE id = 7");

    }

    public function down()
    {
        $this->db->query("UPDATE `apps_settings` SET `value` = 'gif|jpg|png' WHERE id = 4");
        $this->db->query("UPDATE `apps_settings` SET `default_value` = 'gif|jpg|png' WHERE id = 4");

        $this->db->query("INSERT INTO `apps_settings` (`id`, `name`, `value`, `default_value`, `description`, `required`) VALUES(6, 'upload_max_width', '3000', '1024', '<h4>Maximum Upload Width</h4><p>The maximum allowed width for images uploaded by users.</p>', 1)");

        $this->db->query("INSERT INTO `apps_settings` (`id`, `name`, `value`, `default_value`, `description`, `required`) VALUES(7, 'upload_max_height', '2000', '768', '<h4>Maximum Upload Height</h4><p>The maximum allowed height for images uploaded by users.</p>', 1)");

    }
}