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

	public function createtemplate(){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard','refresh');
		}else{
			$this->data['title'] = 'KyLeads Quizzes';
			$this->data['content'] = 'templates/createtemplate';
			$this->data['page'] = 'site';
			$this->load->view('layout', $this->data);
		}
		
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
		$quiztable = "quizzes";
		$questiontable = "questions";
		$this->data['quiz'] =  $this->MQuiz->get_quiz_info($id,$quiztable);
		if($this->data['quiz'] === null){
			$this->data['questions'] = null;
			redirect('quiz/dashboard','refresh');
		}
		else{
			$this->data['questions'] =  $this->MQuiz->view_question_data($id);
		}
		// var_dump($this->data['questions'][1]->choices);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/quizpreview';
        $this->data['page'] = 'site';
        
        $this->load->view('layout', $this->data);
	}

	public function newquiz(){
		// header('Content-Type: application/json');
		$title =$this->input->post('quiztitle');
		$description = $this->input->post('quizdescrip');
		$table = "quizzes";
		$new_quiz_id = $this->MQuiz->createquiz($this->session->userdata('user_id'),$title,$description,$table);	
			// echo json_encode($test);
			// view_quizzes();	
		$this->quiz_configure($new_quiz_id);
	}

	public function newtemplate(){
		// header('Content-Type: application/json');
		if(!$this->isAdmin()){
			redirect('quiz/dashboard','refresh');
		}
		else{
		$title =$this->input->post('quiztitle');
		$description = $this->input->post('quizdescrip');
		$table = "quizzes_template";
		$new_quiz_id = $this->MQuiz->createquiz($this->session->userdata('user_id'),$title,$description,$table);	
			// echo json_encode($test);
			// view_quizzes();	
		$this->configure_template($new_quiz_id);
		}
	}
		
	public function newquiz_temp($quiztemplateID = ''){
			$this->MQuiz->createquiz_from_template($quiztemplateID);
			redirect('quiz/dashboard', 'refresh');
	}

	public function newquestion(){
		$quizid = $_POST['quizID'];
		$title = $this->input->post('questiontitle');
		$description = 'Newly Added Question';
		$table = "questions";
		$this->MQuiz->save_question($title,$description,$quizid,$table);	
			
		redirect('quiz/quiz_configure/'. $quizid, 'refresh');
	}

	public function newtemplatequestion(){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard', 'refresh');
		}
		else{
		$quizid = $_POST['quizID'];
		$title = $this->input->post('questiontitle');
		$description = 'New Template';
		$table = "questions_template";
		$this->MQuiz->save_question($title,$description,$quizid,$table);	
			
		redirect('quiz/configure_template/'. $quizid, 'refresh');
		}
	}

	public function newanswer(){
		
		$quizid = $this->input->post('quizid');
		$questionid = $this->input->post('questionid');
		$answerval = $this->input->post('answerval');
		$choicetable = "choices";
		$this->MQuiz->save_answer($answerval,$questionid,$choicetable);	
				
		redirect('quiz/update_answers/'. $questionid, 'refresh');
	}

	public function newanswer_template(){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard','refresh');
		}
		else{
		$quizid = $this->input->post('quizid');
		$questionid = $this->input->post('questionid');
		$answerval = $this->input->post('answerval');
		$choicetable = "choices_template";
		$this->MQuiz->save_answer($answerval,$questionid,$choicetable);	
				
		redirect('quiz/update_template_answers/'. $questionid, 'refresh');
		}
	}

	public function savequizresult(){

	}

	// public function view_quizzes(){
	// 	$quizzes = $this->MQuiz->view_quizzes();
		
	// 	$this->load->view('layout',$quizzes);
		
	// }

	// public function view_quiz($id = ''){
	// 	$quiztable = "quizzes";
	// 	$questiontable = "questions";
	// 	$this->data['quiz'] = $this->MQuiz->get_quiz_info($id,$quiztable);
	// 	if($this->data['quiz'] === null){
	// 		$this->data['questions'] = null;
	// 	}
	// 	else{
	// 		$this->data['questions'] = $this->MQuiz->view_questions($id,$questiontable);
	// 	}
		
	// 	$this->data['title'] = 'KyLeads Quizzes';
    //     $this->data['content'] = 'quizmenu/viewquiz';
    //     $this->data['page'] = 'site';
        
    //     $this->load->view('layout', $this->data);
	// }


	public function delete_quiz($id = ''){
		$quiztable = "quizzes";
		$questiontable = "questions";
		$choicetable = "choices";
		$this->MQuiz->delete_quiz($id,$quiztable,$questiontable,$choicetable);
		redirect('quiz/dashboard', 'refresh');
	}

	public function delete_quiz_template($id = ''){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard', 'refresh');
		}else{
			$quiztable = "quizzes_template";
			$questiontable = "questions_template";
			$choicetable = "choices_template";
			$this->MQuiz->delete_quiz($id,$quiztable,$questiontable,$choicetable);
			redirect('quiz/templates', 'refresh');
		}
		
		
	}

	public function delete_question($id = ''){
		$questiontable = "questions";
		$question = $this->MQuiz->get_question_info($id,$questiontable);
		$title = $this->input->post('questiontitle');
		
		$this->MQuiz->delete_question($id,$questiontable);
		redirect('quiz/quiz_configure/'. $question->quiz_id, 'refresh');
	}

	public function delete_question_template($id = ''){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard'. $question->quiz_id, 'refresh');
		}
		else{
			$questiontable = "questions_template";
			$question = $this->MQuiz->get_question_info($id,$questiontable);
			$title = $this->input->post('questiontitle');
			$this->MQuiz->delete_question($id,$questiontable);
			redirect('quiz/configure_template/'. $question->quiz_id, 'refresh');
		}
	}

	public function delete_choice($id = ''){
		$choicetable = "choices";
		$choice = $this->MQuiz->get_choice_info($id,$choicetable);
		
		$this->MQuiz->delete_choice($id,$choicetable);
		redirect('quiz/update_answers/'. $choice->question_id, 'refresh');
	}

	public function delete_choice_template($id = ''){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard', 'refresh');
		}
		else{
			$choicetable = "choices_template";
			$choice = $this->MQuiz->get_choice_info($id,$choicetable);
			
			$this->MQuiz->delete_choice($id,$choicetable);
			redirect('quiz/update_template_answers/'. $choice->question_id, 'refresh');
		}
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
		$quiztable = "quizzes";
		$questiontable = "questions";
		$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($id,$quiztable);
		$this->data['questions'] = $this->MQuiz->view_questions($id,$questiontable);
		//var_dump($this->data['questions']);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/editquiz';
		$this->data['page'] = 'site';
		
        
    	$this->load->view('layout', $this->data);
	}
	
	public function configure_template($id = ''){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard','refresh');
		}else{
			$quiztable = "quizzes_template";
			$questiontable = "questions_template";
			$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($id,$quiztable);
			$this->data['questions'] = $this->MQuiz->view_questions($id,$questiontable);
			$this->data['title'] = 'KyLeads Quizzes';
			$this->data['content'] = 'templates/editquiztemplate';
			$this->data['page'] = 'site';
			$this->load->view('layout', $this->data);
		}	
	}

	public function update_quiz_info(){
		$id = $_POST['quizid'];
		$table = "quizzes";
		$title = $this->input->post('quiztitle');
		$description = $this->input->post('quizdescrip');
		$this->MQuiz->update_quiz($id,$title,$description,$table);	

		redirect('quiz/quiz_configure/'.$id, 'refresh');
	}

	public function update_template_info(){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard', 'refresh');
		}else{
			$id = $_POST['quizid'];
			$table = "quizzes_template";
			$title = $this->input->post('quiztitle');
			$description = $this->input->post('quizdescrip');
			$this->MQuiz->update_quiz($id,$title,$description,$table);	
			redirect('quiz/configure_template/'.$id, 'refresh');
		}
	}
	public function update_answers($id = ''){
		$quiztable = "quizzes";
		$questiontable = "questions";
		$choicetable = "choices";
		$this->data['question'] = $this->MQuiz->get_question_info($id,$questiontable);
		$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($this->data['question']->quiz_id,$quiztable);
		$this->data['choices'] = $this->MQuiz->view_choices($id,$choicetable);
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'quizmenu/quizanswer';
        $this->data['page'] = 'site';
        
        $this->load->view('layout', $this->data);

	}
	public function update_template_answers($id = ''){
		if(!$this->isAdmin()){
			redirect('quiz/dashboard','refresh');
		}
		else{
			$quiztable = "quizzes_template";
			$questiontable = "questions_template";
			$choicetable = "choices_template";
			$this->data['question'] = $this->MQuiz->get_question_info($id,$questiontable);
			$this->data['quizinfo'] = $this->MQuiz->get_quiz_info($this->data['question']->quiz_id,$quiztable);
			$this->data['choices'] = $this->MQuiz->view_choices($id,$choicetable);
			$this->data['title'] = 'KyLeads Quizzes';
			$this->data['content'] = 'templates/quizanswertemplate';
			$this->data['page'] = 'site';
			
			$this->load->view('layout', $this->data);
		}

	}
	public function analytics(){
		$this->data['title'] = 'KyLeads Quizzes';
        $this->data['content'] = 'analytics/analytics';
        $this->data['page'] = 'site';
        

        $this->load->view('layout', $this->data);
	}

	private function isAdmin(){

		if($this->session->userdata('user_type') === "Admin"){
			return true;
		}
		return false;
	}
}