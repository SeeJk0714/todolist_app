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

$task_id = $_POST['task_id'];

if(empty($task_id)){
    echo "ERROR";
}else{
    $sql = 'DELETE FROM todolist WHERE id =:id ';
    $query = $database->prepare($sql);
    $query->execute([
        'id' => $task_id
    ]);
    header("Location: index.php");
    exit;
}