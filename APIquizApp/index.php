<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz App</title>
</head>
<body>
    <h4>Quiz App</h4>
    <h3>List of Quizzes</h3>
    <?php 
    $file = 'http://localhost:8084/api/readquiz';
    $data = file_get_contents($file);
    echo $data;
    $result = json_decode($data,true);
    ?>
    <hr>
    <h3>Lis of Questions</h3>
    <?php 
    $file = 'http://localhost:8084/api/quiz?id=14';
    $data = file_get_contents($file);
    echo $data;
    $result = json_decode($data,true);
    ?>
</body>
</html>