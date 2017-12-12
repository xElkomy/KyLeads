<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Paypal extends CI_Migration {

    public function up()
    {
        // Update user table
        $user_fields = array(
            'paypal_token' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
                'after' => 'stripe_sub_id'
                ),
            'paypal_profile_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
                'after' => 'paypal_token'
                ),
            'paypal_profile_status' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE,
                'after' => 'paypal_profile_id'
                ),
            'paypal_last_transaction_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => FALSE,
                'after' => 'paypal_profile_status'
                ),
            'current_subscription_gateway' => array(
                'type' => 'enum("stripe","paypal")',
                'default' => 'stripe',
                'null' => FALSE,
                'after' => 'paypal_last_transaction_id'
                ),
            'payer_id' => array(
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => FALSE,
                'after' => 'current_subscription_gateway'
                ),
            'paypal_next_payment_date' => array(
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => FALSE,
                'after' => 'payer_id'
                ),
            'paypal_previous_payment_date' => array(
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => FALSE,
                'after' => 'paypal_next_payment_date'
                )
            );
        $this->dbforge->add_column('users', $user_fields);

        // Update package table
        $package_fields = array(
            'gateway' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'stripe',
                'null' => TRUE,
                'after' => 'id'
                )
            );
        $this->dbforge->add_column('packages', $package_fields);

        // Create payment_log for paypal
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
                ),
            'request' => array(
                'type' => 'TEXT',
                'constraint' => '100',
                ),
            'response' => array(
                'type' => 'TEXT',
                'constraint' => '100',
                ),
            'date' => array(
                'type' => 'DATETIME',
                'null' => FALSE,
                ),
            ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('payment_log');

        // Manual queries to insert rows
        $insert_data = array(
            array(
                'id' => '4',
                'name' => 'paypal_api_username',
                'value' => '',
                'default_value' => '',
                'description' => 'Enter your PayPal API username.<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>',
                'required' => '0',
                'created_at' => '2017-07-13 00:00:00',
                'modified_at' => 'NULL'
                ),
            array(
                'id' => '5',
                'name' => 'paypal_api_password',
                'value' => '',
                'default_value' => '',
                'description' => 'Enter PayPal API password.<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>',
                'required' => '0',
                'created_at' => '2017-07-13 00:00:00',
                'modified_at' => 'NULL'
                ),
            array(
                'id' => '6',
                'name' => 'paypal_api_signature',
                'value' => '',
                'default_value' => '',
                'description' => 'Enter PayPal API signature.<br> For more details <a href="https://developer.paypal.com/docs/classic/api/apiCredentials/#create-an-api-signature" target="_blank">Click Here</a>',
                'required' => '0',
                'created_at' => '2017-07-13 00:00:00',
                'modified_at' => 'NULL'
                ),
            array(
                'id' => '7',
                'name' => 'paypal_test_mode',
                'value' => 'test',
                'default_value' => 'test',
                'description' => 'Your PayPal Environment',
                'required' => '0',
                'created_at' => '2017-07-13 00:00:00',
                'modified_at' => 'NULL'
                ),
            array(
                'id' => '8',
                'name' => 'payment_gateway',
                'value' => 'paypal',
                'default_value' => 'paypal',
                'description' => 'Select Payment gateway you want for end users. Allowed values are paypal|stripe',
                'required' => '0',
                'created_at' => '2017-07-13 00:00:00',
                'modified_at' => 'NULL'
                ),
            );
        $this->db->insert_batch('payment_settings', $insert_data);

        // Manual queries to update rows
        $update_data = array(
            array(
                'id' => 1,
                'description' => 'Your Stripe Secret Key.<br> For more information <a href="https://stripe.com/docs/dashboard#api-keys" target="_blank">Click Here</a>',
                'modified_at' => date('Y-m-d H:i:s', time())
                ),
            array(
                'id' => 2,
                'description' => 'Your Stripe Publishable Key.<br> For more information <a href="https://stripe.com/docs/dashboard#api-keys" target="_blank">Click Here</a>',
                'modified_at' => date('Y-m-d H:i:s', time())
                )
            );
        $this->db->update_batch('payment_settings', $update_data, 'id');
    }

    public function down()
    {
        $this->dbforge->drop_column('users', 'paypal_token');
        $this->dbforge->drop_column('users', 'paypal_profile_id');
        $this->dbforge->drop_column('users', 'paypal_profile_status');
        $this->dbforge->drop_column('users', 'paypal_last_transaction_id');
        $this->dbforge->drop_column('users', 'current_subscription_gateway');
        $this->dbforge->drop_column('users', 'payer_id');
        $this->dbforge->drop_column('users', 'paypal_next_payment_date');
        $this->dbforge->drop_column('users', 'paypal_previous_payment_date');

        $this->dbforge->drop_table('payment_log');

        /*$this->db->where_in('id',array('4,5,6,7,8'));
        $this->db->delete('payment_settings');*/

        $this->db->delete('payment_settings', array('id' => 4));
        $this->db->delete('payment_settings', array('id' => 5));
        $this->db->delete('payment_settings', array('id' => 6));
        $this->db->delete('payment_settings', array('id' => 7));
        $this->db->delete('payment_settings', array('id' => 8));
    }
}