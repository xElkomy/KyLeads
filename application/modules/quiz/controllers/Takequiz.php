<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Takequiz extends MY_Controller {

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
		'quiz/Quiz_model' => 'MQuiz',
		'quiz/Takequiz_model' => 'MTQuiz',
		];
		$this->load->model($model_list);

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
		if ( ! $this->session->has_userdata('user_id'))
		{
			redirect('auth', 'refresh');
		}
	}
	
	public function submitData(){
		$results = $_POST['results'];
    	$data = json_decode($results);
		// var_dump("asdfsfsf");
		$this->MTQuiz->submitresult($data);
		
	}
	public function quiz($id = ''){
		$quiztable = "quizzes";
		$questiontable = "questions";
		$choicetable = "choices";
		$outcometable = "outcomes";
		$this->data['quizid'] = $id;
		if(!$this->isQuizActive($id,$quiztable)){
			$this->data['status'] = "Note: This quiz is still unpublish and not yet visible to the public";
		}else {
			$this->data['status'] = "";
		}
		$this->data['quiz'] =  $this->MQuiz->view_quiz_data($id,$quiztable,$questiontable,$choicetable,$outcometable);
		if($this->data['quiz'] === null){
			$this->data['questions'] = null;
			redirect('quiz/dashboard','refresh');
		}
		$this->data['title'] = 'KyLeads Quizzes';
		$this->data['content'] = 'takequiz/viewquiz';
		$this->data['page'] = 'site';
			
		$this->load->view('layout', $this->data);
		
		// -----------------------
	}
	
	private function isQuizActive($id,$quiztable){
		$data = $this->MQuiz->GetQuizStatus($id,$quiztable);
		if(count($data)>0){
			return true;
		}else{
			return false;
		}	
	}
}	