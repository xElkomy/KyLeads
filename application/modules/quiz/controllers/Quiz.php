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
		'quiz/Quiz_model' => 'MQuiz',
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
		$this->data['quizzes'] = $this->MQuiz->view_quizzes();

        $this->load->view('layout', $this->data);

		// $this->load->view('quiz/Quiz_view');
	}
	
	public function dashboard(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'dashboard'; //dashboard
		$this->data['page'] = 'site';
		$this->data['quizzes'] = $this->MQuiz->view_quizzes();
		
        $this->load->view('layout', $this->data);
	
	}
	
	public function contacts(){
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'contacts/contacts';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
		
	}
	public function create(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/create';
		$this->data['page'] = 'site';
		$this->data['quizzes_template'] = $this->MQuiz->view_quizzes_template();
		
        $this->load->view('layout', $this->data);
	}

	public function templates(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'templates/templates';
		$this->data['page'] = 'site';
		$this->data['quizzes_template'] = $this->MQuiz->view_quizzes_template();
		
        $this->load->view('layout', $this->data);
	}

	public function preview_template($id = ''){
		$this->data['quizzes'] =  $this->MQuiz->view_quiz_template_data($id);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'templates/template_preview';
        $this->data['page'] = 'site';
        
    	$this->load->view('layout', $this->data);
	}

	public function preview_quiz($id = ''){
		$this->data['quiz'] =  $this->MQuiz->get_quiz_info($id);
		if($this->data['quiz'] === null){
			$this->data['questions'] = null;
		}
		else{
			$this->data['questions'] =  $this->MQuiz->view_question_data($id);
		}
		// var_dump($this->data['questions'][1]->choices);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizpreview/quizpreview';
        $this->data['page'] = 'site';
        
        $this->load->view('layout', $this->data);
	}

	public function newquiz(){
		// header('Content-Type: application/json');

		$title =$this->input->post('quiztitle');
		$description = $this->input->post('quizdescrip');
			// echo $test;
		$this->MQuiz->createquiz($this->session->userdata('user_id'),$title,$description);	
			// echo json_encode($test);
			// view_quizzes();	
		redirect('quiz/dashboard', 'refresh');
	}

	public function newquiz_temp($quiztemplateID = ''){
		$this->MQuiz->createquiz_from_template($quiztemplateID);
		redirect('quiz/dashboard', 'refresh');
	}

	public function newquestion(){
		// changes by mel
		// $quizid = $this->input->post('quizid');
		// $title = $this->input->post('questiontitle');
		// $description = 'Newly Added Question';
		// $typeID = '1';
			
		// $questionid = $this->MQuiz->save_question($title,$description,$quizid	,$typeID);	
			
		// redirect('quiz/view_quiz/'. $quizid, 'refresh');
		$quizid = $_POST['quizID'];
		$title = $this->input->post('questiontitle');
		$description = 'Newly Added Question';
		$typeID = '1';
		
		$this->MQuiz->save_question($title,$description,$quizid	,$typeID);	
			
		redirect('quiz/quiz_configure/'. $quizid, 'refresh');
	}

	public function newanswer(){
		
		$quizid = $this->input->post('quizid');
		$questionid = $this->input->post('questionid');
		$answerval = $this->input->post('answerval');
		$this->MQuiz->save_answer($answerval,$questionid);	
				
		redirect('quiz/update_answers/'. $questionid, 'refresh');
	}

	public function savequizresult(){

	}

	// public function view_quizzes(){
	// 	$quizzes = $this->MQuiz->view_quizzes();
		
	// 	$this->load->view('layout',$quizzes);
		
	// }

	public function view_quiz($id = ''){
		$this->data['quiz'] = $this->MQuiz->get_quiz_info($id);
		if($this->data['quiz'] === null){
			$this->data['questions'] = null;
		}
		else{
			$this->data['questions'] = $this->MQuiz->view_questions($id);
		}
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/viewquiz';
        $this->data['page'] = 'site';
        
        $this->load->view('layout', $this->data);

	}


	public function delete_quiz($id = ''){
		$this->MQuiz->delete_quiz($id);
		redirect('quiz/dashboard', 'refresh');
	}

	public function delete_question($id = ''){
		
		$question = $this->MQuiz->get_question_info($id);
		$title = $this->input->post('questiontitle');
		
		$this->MQuiz->delete_question($id);
		redirect('quiz/quiz_configure/'. $question->quiz_id, 'refresh');
	}
	public function delete_choice($id = ''){
		
		$choice = $this->MQuiz->get_choice_info($id);
		
		$this->MQuiz->delete_choice($id);
		redirect('quiz/update_answers/'. $choice->question_id, 'refresh');
	}
	public function integrations(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'integrations/integrations';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}
	
	public function forms(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'forms/forms';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}

	public function quiz_configure($id = ''){

		$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($id);
		$this->data['questions'] = $this->MQuiz->view_questions($id);
		//var_dump($this->data['questions']);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/editquiz';
		$this->data['page'] = 'site';
		
        
    	$this->load->view('layout', $this->data);
	}
	
	public function update_quiz_info(){
		$id = $_POST['quizid'];
		$title = $this->input->post('quiztitle');
		$description = $this->input->post('quizdescrip');
		$this->MQuiz->update_quiz($id,$title,$description);	

		redirect('quiz/quiz_configure/'.$id, 'refresh');
	}

	public function update_answers($id = ''){

		$this->data['question'] = $this->MQuiz->get_question_info($id);
		$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($this->data['question']->quiz_id);
		$this->data['choices'] = $this->MQuiz->view_choices($id);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/quizanswer';
        $this->data['page'] = 'site';
        
        $this->load->view('layout', $this->data);

	}

	public function analytics(){
		
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'analytics/analytics';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}
}