<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
if(count($quizzes)>0){
    $quiz_arr=array();
    $quiz_arr["records"]=array();
   
    foreach ($quizzes as $key => $quiz) {

        // echo $quiz->title;
        $quiz_item=array(
            "user id" => $quiz->user_id,
            "title" => $quiz->title,
            "description" => $quiz->description,
        );

        array_push($quiz_arr["records"], $quiz_item);
        // echo $quiz->title;
    }
    // var_dump($quiz_item);
    echo json_encode($quiz_arr["records"]);
}
else{
    echo json_encode(
        array("message" => "No Quizzes found.")
     );
}