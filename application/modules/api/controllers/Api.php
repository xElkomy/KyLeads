<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {

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
		'sites/Sites_model' => 'MSites',
		'sites/Pages_model' => 'MPages',
		'api/Quiz_model' => 'MQuiz',
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
	public function readquiz()
	{
		/** Hook point */
         error_reporting(-1);
		$this->data['title'] = 'KyLeads API';
		$this->data['content'] = 'quiz/getquiz';
		$this->data['quizzes'] = $this->MQuiz->view_quizzes();
        $this->load->view('layout', $this->data);

		// $this->load->view('quiz/Quiz_view');
	}
	public function quiz(){
		$id = isset($_GET['id']) ? $_GET['id'] : die();
		$this->data['title'] = 'KyLeads API';
		$this->data['content'] = 'quiz/quiz';
		$this->data['questions'] = $this->MQuiz->view_questions($id,"questions");
		// var_dump($this->data['quiz']);
        $this->load->view('layout', $this->data);
	}
	
	public function quizreport(){
		$userID = $this->session->userdata('user_id');
		$quizID = isset($_GET['id']) ? $_GET['id'] : die();
		// $userID = isset($_GET['userid']) ? $_GET['userid'] : die();
		if($this->MQuiz->isMyQuiz($quizID)){
			$this->data['title'] = 'KyLeads API';
			$this->data['content'] = 'quizreport/viewreport';
			$tableviews = "quiz_views";
			$tablestarts = "quiz_starts";
			$tablecompletions ="quiz_completions";
			$tablecontacts = "contacts_results";
			$tablectaclicks = "cta_clicks";
			$tableoutcomes = "contacts_results";
			$tableresults = "results";
			$this->data['views'] = $this->MQuiz->get_quiz_report($quizID,$tableviews);
			$this->data['starts'] = $this->MQuiz->get_quiz_report($quizID,$tablestarts);
			$this->data['completions'] = $this->MQuiz->get_quiz_report($quizID,$tablecompletions);
			$this->data['contacts'] = $this->MQuiz->get_quiz_report($quizID,$tablecontacts);
			$this->data['ctaclicks'] = $this->MQuiz->get_quiz_report($quizID,$tablectaclicks);
			
			if(isset($_GET['outcomeid'])){
				$outcomeID = isset($_GET['outcomeid']) ? $_GET['outcomeid'] : die();
				$this->data['outcomeresults'] = $this->MQuiz->get_quiz_outcome_report($quizID,$outcomeID,$tableoutcomes);
			}
			if(isset($_GET['questionid'])){
				$questionID = isset($_GET['questionid']) ? $_GET['questionid'] : die();
				$this->data['questionresults'] = $this->MQuiz->get_quiz_question_report($questionID);
			}
			
			if(isset($_GET['outcomeid'])){
				$quizreportdetials=array(
					"completes" => $this->data['contacts'],
					"results" => $this->data['outcomeresults'],
				);
				$jsonData = json_encode($quizreportdetials);
				echo $jsonData;
				return $jsonData;
			}
			if(isset($_GET['questionid'])){
				$questionID = isset($_GET['questionid']) ? $_GET['questionid'] : die();
				if($this->MQuiz->isQuestionExist($quizID,$questionID)){
						$quizreportdetials=array(
						"completes" => $this->data['contacts'],
						"results" => $this->data['contacts'],
						"answers" => $this->data['questionresults']
					);
					$jsonData = json_encode($quizreportdetials);
					echo $jsonData;
					return $jsonData;
				}
				$jsonData = json_encode(
					array("message" => "Not found.")
				 );
				echo $jsonData;
				return $jsonData;
			}
			if(isset($_GET['id']) && $_GET['outcomeid'] == null){
				$quizreportdetials=array(
					"views" => $this->data['views'],
					"starts" => $this->data['starts'],
					"completions" => $this->data['completions'],
					"contacts" => $this->data['contacts'],
					"ctaclicks" => $this->data['ctaclicks'],
				);
				
				$jsonData = json_encode($quizreportdetials);
				echo $jsonData;
				return $jsonData;
			}
			
		}else{
			die();
		}
		
    }
	
}