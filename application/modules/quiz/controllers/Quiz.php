<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends MY_Controller {

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
		'quiz/New_quiz_model' => 'NQuiz',
		'quiz/Customize_quiz_model' => 'CQuiz'
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
         error_reporting(-1);

        $this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'dashboard';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);

		// $this->load->view('quiz/Quiz_view');
	}
	
	public function dashboard(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'dashboard';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	
	}
	
	public function contacts(){
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'contacts';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
		
	}
	public function create(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'create';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}
	
	public function integrations(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'integrations';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}
	
	public function forms(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'forms';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}
	
	public function analytics(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'analytics';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}

}