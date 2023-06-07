<?php
$todolist = [];
$host = 'devkinsta_db';
$dbname = 'Exercise_Todo_List_App';
$dbuser = 'root';
$dbpassword = 'GObT0SaYlthXkrat';

$database = new PDO(
    "mysql:host=$host;dbname=$dbname",
    $dbuser,
    $dbpassword
);

$task_completed = $_POST['task_completed'];
$task_id = $_POST['task_id'];

if($task_completed == 1){
    $task_completed = 0;
}else if($task_completed == 0){
    $task_completed = 1; 
}

if( empty($task_id)){
    echo "ERROR";
}else{
    $sql = 'UPDATE todolist set completed = :completed WHERE id = :id';
    $query = $database->prepare($sql);
    $query->execute([
        'completed' => $task_completed,
        'id' => $task_id
    ]);
    header("Location: /");
    exit;
}