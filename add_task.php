<?php
session_start();

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

$task_name = $_POST['task_name'];

if(empty($task_name)){
    $error = "ERROR";
}else{
    $sql = 'INSERT INTO todolist (`task`,`completed`) VALUES(:task,:completed)';
    $query = $database->prepare($sql);
    $query->execute([
        'task' => $task_name,
        'completed' => 0
    ]);
    header("Location: /");
    exit;
}
if(isset($error)){
    $_SESSION['error'] = $error;
    header("Location: /");
    exit;
}