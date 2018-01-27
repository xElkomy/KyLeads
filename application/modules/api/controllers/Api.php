<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {

	/**
     * Class constructor
     *
     * Loads required models, check if user has right to access this class, loads the hook class and add a hook point
     *
     * @return  void
     */
	
	protected $tableviews = "quiz_views";
	protected $tablestarts = "quiz_starts";
	protected $tablecompletions ="quiz_completions";
	protected $tablecontacts = "contacts_results";
	protected $tablectaclicks = "cta_clicks";
	protected $tableoutcomes = "contacts_results";
	protected $tableresults = "results";
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
		// echo "user : ".$userID;
		// echo "quiz : ".$quizID;
		$starton = '2018-01-25';
		$endon = '2018-01-27';
		if($this->MQuiz->isMyQuiz($quizID)){
			$startdate = $starton.' 00:00:00';
			$enddate = $endon.' 23:59:59';
			$days = $this->getDateRange($starton,$endon);
			
			$this->data['views'] = $this->MQuiz->get_quiz_report($quizID,$this->tableviews,$startdate,$enddate);
			$this->data['starts'] = $this->MQuiz->get_quiz_report($quizID,$this->tablestarts,$startdate,$enddate);
			$this->data['completions'] = $this->MQuiz->get_quiz_report($quizID,$this->tablecompletions,$startdate,$enddate);
			$this->data['contacts'] = $this->MQuiz->get_quiz_report($quizID,$this->tablecontacts,$startdate,$enddate);
			$this->data['ctaclicks'] = $this->MQuiz->get_quiz_report($quizID,$this->tablectaclicks,$startdate,$enddate);
			
			$contact_results  = $this->MQuiz->get_contacts_results_data($quizID,$this->tablecontacts,$startdate,$enddate);
			
			if(isset($_GET['outcomeid'])){
				$outcomeID = isset($_GET['outcomeid']) ? $_GET['outcomeid'] : die();
				$this->data['outcomeresults'] = $this->MQuiz->get_quiz_outcome_report($quizID,$outcomeID,$this->tableoutcomes,$startdate,$enddate);
			}
			if(isset($_GET['questionid'])){
				
				$questionID = isset($_GET['questionid']) ? $_GET['questionid'] : die();
				$this->data['questionresults'] = $this->MQuiz->get_quiz_question_report($questionID,$contact_results[0]->id,$contact_results[count($contact_results)-1]->id);
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

				$reportsperday = array();
				foreach ($days as $key => $day) {
					$startday = $day.' 00:00:00';
					$endday = $day.' 23:59:59';
					
					$viewsonday = $this->MQuiz->get_quiz_report($quizID,$this->tableviews,$startday,$endday);
					$startsonday = $this->MQuiz->get_quiz_report($quizID,$this->tablestarts,$startday,$endday);
					$completionsonday = $this->MQuiz->get_quiz_report($quizID,$this->tablecompletions,$startday,$endday);
					$contactsonday= $this->MQuiz->get_quiz_report($quizID,$this->tablecontacts,$startday,$endday);
					$ctaclicksonday = $this->MQuiz->get_quiz_report($quizID,$this->tablectaclicks,$startday,$endday);

					$rates = $this->getpercentage($contactsonday,$viewsonday);
					$reportsperday[$day] = array(
							"rate" => $rates,
					);
				}

				$quizreportdetials=array(
					"views" => $this->data['views'],
					"starts" => $this->data['starts'],
					"completions" => $this->data['completions'],
					"contacts" => $this->data['contacts'],
					"ctaclicks" => $this->data['ctaclicks'],
					"daily_conversion_rate" => $reportsperday,
				);
				$jsonData = json_encode($quizreportdetials);
				echo $jsonData;
				return $jsonData;
			}
			
		}else{
			
			die();
		}
	}
	
	public function mydatareports(){
		$userID = $this->session->userdata('user_id');
		$mydata['results'] = array();
		
		if(isset($userID)){
			$projectID = $this->session->userdata('quizproj_id');
			$quizzes = $this->MQuiz->get_all_quiz($projectID);
			$quizData = array();
			$startdate = '2017-12-08'.' 00:00:00';
			$enddate = '2018-01-27'.' 23:59:59';

			foreach ($quizzes as $key => $quiz) {
				
				$this->data['views'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tableviews,$startdate,$enddate);
				$this->data['starts'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablestarts,$startdate,$enddate);
				$this->data['completions'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablecompletions,$startdate,$enddate);
				$this->data['contacts'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablecontacts,$startdate,$enddate);
				$this->data['ctaclicks'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablectaclicks,$startdate,$enddate);
				
				$quizreportdetials=array(
						"views" => $this->data['views'],
						"starts" => $this->data['starts'],
						"completions" => $this->data['completions'],
						"contacts" => $this->data['contacts'],
						"ctaclicks" => $this->data['ctaclicks'],
				);
				
				$quizData[$quiz->auth_token] = $quizreportdetials;	
			}
			$mydata['results']['quiz'] = $quizData;
			$jsonData = json_encode($mydata);
		
			echo $jsonData;
			return $jsonData;
		}else{
			die();
		}
		
		
		
	}

	public function getprojectreports(){
		$userID = $this->session->userdata('user_id');
		
		
		if(isset($userID)){
			$projects = $this->MQuiz->get_all_projects();

			$projectdata['results'] = array();
			
			
			foreach ($projects as $key => $project) {
				$quizdata = array();
				$projectID = $project->auth_token;
				
				$quizzes = $this->MQuiz->get_all_quiz($projectID);
				
				$quizData = array();
				$startdate = '2017-12-08'.' 00:00:00';
				$enddate = '2018-01-27'.' 23:59:59';
				
				$projectreport['reports'] = array("views"=>0,"starts"=>0,"completions"=>0,"contacts"=>0,"ctaclicks"=>0);
				foreach ($quizzes as $key => $quiz) {
					
					$this->data['views'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tableviews,$startdate,$enddate);
					$this->data['starts'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablestarts,$startdate,$enddate);
					$this->data['completions'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablecompletions,$startdate,$enddate);
					$this->data['contacts'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablecontacts,$startdate,$enddate);
					$this->data['ctaclicks'] = $this->MQuiz->get_quiz_report($quiz->auth_token,$this->tablectaclicks,$startdate,$enddate);
					
					$quizreportdetials=array(
							"views" => $this->data['views'],
							"starts" => $this->data['starts'],
							"completions" => $this->data['completions'],
							"contacts" => $this->data['contacts'],
							"ctaclicks" => $this->data['ctaclicks'],
					);
					
					$projectreport['reports']['views'] += $this->data['views'];
					$projectreport['reports']['starts'] += $this->data['starts'];
					$projectreport['reports']['completions'] += $this->data['completions'];
					$projectreport['reports']['contacts'] += $this->data['contacts'];
					$projectreport['reports']['ctaclicks'] += $this->data['ctaclicks'];

					$quizData[$quiz->auth_token] = $quizreportdetials;	
				}

				$projectdata['results'][$projectID] = $projectreport;
				$projectdata['results'][$projectID]['quizData'] = $quizData;
			}
			
			$jsonData = json_encode($projectdata);
			
			echo $jsonData;
			return $jsonData;
		}else{
			die();
		}
		
		

	}

	// --------------PRIVATE FUNCTIONS--------------------
	private function getDateRange($startDate, $endDate, $format = "Y-m-d")
	{
		
		$begin = new DateTime($startDate);
		$end = new DateTime($endDate);

		$interval = new DateInterval('P1D'); // 1 Day
		$dateRange = new DatePeriod($begin, $interval, $end);

		$range = [];
		if($startDate == $endDate){
			$range[] = $startDate;
			return $range;
		}
		foreach ($dateRange as $date) {
			$range[] = $date->format($format);
		}
		array_push($range,$endDate);
		return $range;
	}

	private function getpercentage($contacts,$views){
		if($views == 0 || $contacts == 0 && $views == 0){
			return 0;
		}
		return round($contacts/$views*100);
	}


}