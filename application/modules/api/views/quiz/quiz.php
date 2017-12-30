<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
if(count($questions)>0){
    $question_arr=array();
    $question_arr["records"]=array();
   
    foreach ($questions as $key => $question) {

        // echo $quiz->title;
        $question_item=array(
            "id" => $question->id,
            "title" => $question->title,
            "description" => $question->description,
        );

        array_push($question_arr["records"], $question_item);
        // echo $quiz->title;
    }
    // var_dump($quiz_item);
    echo json_encode($question_arr["records"]);
}
else{
    echo json_encode(
        array("message" => "No Questions found.")
     );
}