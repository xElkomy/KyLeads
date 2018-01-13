<?php 
    // if(count($quizviews)>0){
    //     $views_arr=array();
        
    //     array_push($views_arr["records"], $views_arr);
    //     echo json_encode($views_arr["records"]);
    // }
    // else{
    //     echo json_encode(
    //         array("message" => "No Questions found.")
    //     );
    // }

$quizreportdetials=array(
    "views" => $views,
    "starts" => $starts,
    "completions" => $completions,
);

$jsonData = json_encode($quizreportdetials);
echo $jsonData;
return $jsonData;