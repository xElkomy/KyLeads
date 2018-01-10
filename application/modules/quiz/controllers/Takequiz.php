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
		'contacts/Contacts_model' => 'MContacts',
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
	
	public function startquiz(){
		$results = $_POST['results'];
    	$this->data['quizdata'] = json_decode($results);
		/**put hook here */
		$this->hooks->call_hook('quiz_start_add');
	}

	public function completequiz(){
		$results = $_POST['results'];
    	$this->data['quizdata'] = json_decode($results);
		/**put hook here */
		$this->hooks->call_hook('quiz_complete_add');
	}
	
	public function getresult(){
		// $this->data['outcomeData'] = $_POST['outcomeresult'];
		if(isset($_GET['id'])){
			$outcomeid = $_GET['id'];
			$outcometable = "outcomes";
			// $this->data['out'] = $this->TQuiz->get_outcome_info($outcomeid,$outcometable);
			$this->data['outcome'] = $this->MQuiz->view_outcome_data($outcomeid,$outcometable);
			if(count($this->data['outcome']) > 0){
				$this->data['title'] = 'KyLeads Quizzes';
				$this->data['content'] = 'takequiz/viewresult';
				$this->data['page'] = 'site';
						
				$this->load->view('layout', $this->data);
			}else {
				echo "Page not found";
			}
			
		}
		
	}

	public function quiz($id = '',$outcomeData =''){

		// $this->data['outcomeData'] = $_POST['outcomeresult'];
		// echo $this->data['outcomeData'];
		$quiztable = "quizzes";
		$questiontable = "questions";
		$choicetable = "choices";
		$outcometable = "outcomes";
		$this->data['quizid'] = $id;
		
		if($this->MQuiz->isMyQuiz($id)){
			
			
			
			if(!$this->MQuiz->QuizStatus($id,$quiztable)){
				$this->data['status'] = "Note: This quiz is still unpublish and not yet visible to the public";
			}else{
				$this->data['status'] = "";
			}
			$this->data['quiz'] =  $this->MQuiz->view_quiz_data($id,$quiztable,$questiontable,$choicetable,$outcometable);
			$this->data['outcomes'] = $this->MQuiz->view_outcomes($id,$outcometable);
			if($this->data['quiz'] === null){
				$this->data['questions'] = null;
				redirect('quiz/dashboard','refresh');
			}
			/**put hook here */
			$this->hooks->call_hook('quiz_views_add');
			// $outcomeresultid = $_POST['outcomeresult'];
			$this->data['outcomeData'] = $outcomeData;

			$this->data['title'] = 'KyLeads Quizzes';
			$this->data['content'] = 'takequiz/viewquiz';
			$this->data['page'] = 'site';
				
			$this->load->view('layout', $this->data);
		}
		else if($this->MQuiz->QuizStatus($id,$quiztable)){
			
			
			$this->data['status'] = "";
			$this->data['quiz'] =  $this->MQuiz->view_quiz_data($id,$quiztable,$questiontable,$choicetable,$outcometable);
			if($this->data['quiz'] === null){
				$this->data['questions'] = null;
				redirect('quiz/dashboard','refresh');
			}
			/**put hook here */
			$this->hooks->call_hook('quiz_views_add');

			$this->data['title'] = 'KyLeads Quizzes';
			$this->data['content'] = 'takequiz/viewquiz';
			$this->data['page'] = 'site';
				
			$this->load->view('layout', $this->data);
		}else{
			redirect('auth', 'refresh');
		}
		
		// -----------------------
	}
	public function quiztemp($id = ''){
		$quiztable = "quizzes_template";
		$questiontable = "questions_template";
		$choicetable = "choices_template";
		$outcometable = "outcomes_template";
		$this->data['quizid'] = $id;

		/**Admin preview */
		if($this->session->has_userdata('user_id') && $this->session->userdata('user_type') == 'Admin'){
			if(!$this->isQuizActive($id,$quiztable)){
				$this->data['status'] = "Note: This quiz is still unpublish and not yet visible to the public";
				$isActive = false;
			}else {
				$this->data['status'] = "";
				$isActive = true;
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
			
		} /**user preview */
		else if($this->session->has_userdata('user_id') && $this->session->userdata('user_type') == 'User'){
			if(!$this->MQuiz->QuizStatus($id,$quiztable)){
				
			}else{
				$this->data['quiz'] =  $this->MQuiz->view_quiz_data($id,$quiztable,$questiontable,$choicetable,$outcometable);
				if($this->data['quiz'] === null){
					$this->data['questions'] = null;
					redirect('quiz/dashboard','refresh');
				}
				$this->data['title'] = 'KyLeads Quizzes';
				$this->data['content'] = 'takequiz/viewquiztemplate';
				$this->data['page'] = 'site';
						
				$this->load->view('layout', $this->data);
			}
		}
		// --------------------------------
		// if(!$this->isQuizActive($id,$quiztable)){
		// 	redirect('auth', 'refresh');
		// }else {
		// 	$this->data['quiz'] =  $this->MQuiz->view_quiz_data($id,$quiztable,$questiontable,$choicetable,$outcometable);
		// 	if($this->data['quiz'] === null){
		// 		$this->data['questions'] = null;
		// 		redirect('quiz/dashboard','refresh');
		// 	}
		// 	$this->data['title'] = 'KyLeads Quizzes';
		// 	$this->data['content'] = 'takequiz/viewquiz';
		// 	$this->data['page'] = 'site';
				
		// 	$this->load->view('layout', $this->data);
		// }		
		// -----------------------
	}


	public function AddContact(){
		$accData = $_POST['accountData'];
		$rData = $_POST['resultData'];

		$accountdata = json_decode($accData);
		$resultData = json_decode($rData);
		
		$new_contact_id = $this->MContacts->newContact($accountdata);

		$this->AddContactData($new_contact_id,$accountdata->quizid,$accountdata->outcomeid);
		$this->submitResultData($resultData,$new_contact_id);
	}

	private function submitResultData($data,$contactid){
		
		// var_dump("asdfsfsf");
		$this->MTQuiz->submitresult($data,$contactid);
		
	}

	private function GetMyResult($outcomeid){
		$outcometable = "outcomes";
		$outcome_details = $this->TQuiz->GetOutcomeDetails($outcomeid,$outcometable);
	}

	private function AddContactData($contactid,$quizid,$outcomeid){
		// var_dump($data->$outcomeid);
		$this->MTQuiz->Addcontacts_results($contactid,$quizid,$outcomeid);
	}

	// -------------------------------
	private function isQuizActive($id,$quiztable){
		$data = $this->MQuiz->GetQuizStatus($id,$quiztable);
		if(count($data)>0){
			return true;
		}else{
			return false;
		}	
	}
}	