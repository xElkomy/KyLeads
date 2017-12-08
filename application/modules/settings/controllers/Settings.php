<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	/**
     * Class constructor
     *
     * Loads required models, check if user has right to access this class, loads the hook class and add a hook point
     *
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();

		$model_list = [
		'user/Users_model' => 'MUsers',
		'sites/Sites_model' => 'MSites',
		'sites/Pages_model' => 'MPages',
		'settings/Apps_settings_model' => 'MApps',
		'settings/Payment_settings_model' => 'MPayments',
		'settings/Core_settings_model' => 'MCores'
		];
		$this->load->model($model_list);

		if ( ! $this->session->has_userdata('user_id'))
		{
			redirect('auth', 'refresh');
		}

		$this->hooks =& load_class('Hooks', 'core');

        /** Hook point */
        $this->hooks->call_hook('settings_construct');
	}

	/**
	 * Load the settings page
	 *
	 * @return 	void
	 */
	public function index()
	{
		/** Hook point */
        $this->hooks->call_hook('settings_index_pre');

		if ($this->session->userdata('user_type') != "Admin")
		{
			redirect('site', 'refresh');
		}

		/** Check if the license_key field exist, if not create a blank one */
		$core = $this->MCores->get_by_name('license_key');
		if (count($core) == 0)
		{
			$name = 'license_key';
			$description = '<h5>License Key</h5>
			<p>
				License Key, without this key you are unable to get further updates.
			</p>';
			$required = 1;
			$this->MCores->create($name, $description, $required);
		}

		/** Grab all three settings value */
		$this->data['apps'] = $this->MApps->get_all();
		$this->data['payments'] = $this->MPayments->get_all();
		$this->data['cores'] = $this->MCores->get_all();
		$this->data['page'] = "settings";

		/** Hook point */
        $this->hooks->call_hook('settings_index_post');

		$this->load->view('settings/settings', $this->data);
	}

	/**
	 * Updates the apps settings
	 *
	 * @return 	void
	 */
	public function update()
	{
		/** Hook point */
        $this->hooks->call_hook('settings_update_pre');

		$this->form_validation->set_rules('elements_dir', 'elements_dir', 'required');
		$this->form_validation->set_rules('images_dir', 'images_dir', 'required');
		$this->form_validation->set_rules('images_uploadDir', 'images_uploadDir', 'required');
		$this->form_validation->set_rules('upload_allowed_types', 'upload_allowed_types', 'required');
		$this->form_validation->set_rules('upload_max_size', 'upload_allowed_types', 'required|numeric');
		$this->form_validation->set_rules('images_allowedExtensions', 'images_allowedExtensions', 'required');
		$this->form_validation->set_rules('export_fileName', 'export_fileName', 'required');
		$this->form_validation->set_rules('language', 'language', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			/** Some errors :( */
			$this->session->set_flashdata('error', $this->lang->line('settings_update_error') . validation_errors());
		}
		else
		{
			/** All good :) Update the data */
			$this->MApps->update($this->input->post());
			$this->session->set_flashdata('success', $this->lang->line('settings_update_success'));
		}

		/** Hook point */
        $this->hooks->call_hook('settings_update_post');

		redirect('settings', 'location');
	}

	/**
	 * Update the payment settings
	 *
	 * @return 	void
	 */
	public function update_payment()
	{
		/** Hook point */
        $this->hooks->call_hook('settings_update_payment_pre');

		if ($this->input->post())
		{
			/** Update the data */
			$this->MPayments->update($this->input->post());
			$this->session->set_flashdata('success', $this->lang->line('settings_update_success'));
		}

		/** Hook point */
        $this->hooks->call_hook('settings_update_payment_post');

		redirect('settings', 'location');
	}

	/**
	 * Update the core settings
	 *
	 * @return 	void
	 */
	public function update_core()
	{
		/** Hook point */
        $this->hooks->call_hook('settings_update_core_pre');

		if ($this->input->post())
		{
			/** Update the data */
			$this->MCores->update($this->input->post());

			/** License key validation */
			$url = $this->config->item('license_uri') . trim($this->input->post('license_key'));
			/** curl */
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$output = curl_exec($ch);
			curl_close($ch);
			if ($output == 'valid')
			{
				$this->session->set_flashdata('success', $this->lang->line('settings_update_success'));
			}
			else
			{
				$this->session->set_flashdata('error', $this->lang->line('settings_update_invalid_key_error'));
			}

		}

		/** Hook point */
        $this->hooks->call_hook('settings_update_core_post');

		redirect('settings', 'location');
	}

	/* Test Section */
	public function license_check()
	{
		$key = 'abc';
		$url = 'http://sbprolicense.dev/api/verify_key/' . $key;
		//echo $url;
		/** curl **/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
	}
	public function cust_add()
	{
		$options['mode'] = 'test';
		$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N4kJXY';
		//$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N'; // wrong sk
		$options['stripe_publishable_key'] = 'pk_test_LCBPFcRtihTBXZ9XCeZtdsgR';
		$this->load->library('Stripe', $options);
		$customer['email'] = 'tapan@innovativebd.net';
		$customer['description'] = 'Test Customer';
		$cus_id = $this->stripe->addCustomer($customer);
		echo $cus_id;
	}

	public function cust_list()
	{
		$options['mode'] = 'test';
		$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N4kJXY';
		//$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N'; // wrong sk
		$options['stripe_publishable_key'] = ' pk_test_LCBPFcRtihTBXZ9XCeZtdsgR';
		$this->load->library('Stripe', $options);
		$customer = array('limit' => 3);
		$cus = $this->stripe->listCustomers($customer);
		var_dump($cus['data'][0]['id']);
	}

	public function pack_sub()
	{
		$options['mode'] = 'test';
		$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N4kJXY';
		//$options['stripe_secret_key'] = 'sk_test_47Czw1072NYOn9b5d7N'; // wrong sk
		$options['stripe_publishable_key'] = ' pk_test_LCBPFcRtihTBXZ9XCeZtdsgR';
		$this->load->library('Stripe', $options);

		$customer = array('limit' => 3);
		$cus = $this->stripe->listCustomers($customer);
		// var_dump($cus['data'][0]['id']);
		// die();

		// $plan_opt['id'] = 'plan_03';
		// $plan_opt['amount'] = 1000;
		// $plan_opt['currency'] = 'USD';
		// $plan_opt['interval'] = 'month';
		// $plan_opt['name'] = '3 months subscription';
		// $plan_opt['interval_count'] = 3;
		// $plan_opt['statement_descriptor'] = 'SBPro Subscription';

		// $plan = $this->stripe->addPlan($plan_opt);
		// var_dump($plan);
		// die();

		//$sub_opt['customer'] = $cus['data'][0]['id'];
		$sub_opt['plan'] = 'plan_03';
		$sub_opt['metadata'] = array('plan' => '3 months');
		$sub_opt['quantity'] = 1;
		$sub_opt['source'] = array(
			'object'	=> 'card',
			'exp_month'	=> '12',
			'exp_year'	=> '2018',
			'number'	=> '4242424242424141',
			'cvc'		=> '123',
			'name'		=> 'Tapan Kumer Das'
			);
		$sub_opt['trial_end'] = 'now';

		$subscribe = $this->stripe->addSubscription($cus['data'][0]['id'], $sub_opt);
		var_dump($subscribe);
		die();
	}
	/* Test Section */

	/**
     * Controller desctruct method for custom hook point
     *
     * @return void
     */
	public function __destruct()
    {
        /** Hook point */
        $this->hooks->call_hook('settings_destruct');
    }

}