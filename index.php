<?php
session_start();

// require "includes/functions.php";
require "includes/class-db.php";
require "includes/class-auth.php";
require "includes/class-task.php";

$path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = trim($path,'/');
$auth = new Auth();
$task = new Task();

switch ($path){
    case 'auth/login':
        // require 'includes/auth/login.php';
        $auth->login();
        break;
    case 'auth/signup':
        // require 'includes/auth/signup.php';
        $auth->signup();
        break;
    case 'task/add':
        // require 'includes/task/add.php';
        $task->add();
        break;  
    case 'task/update':
        // require 'includes/task/update.php';
        $task->completed();
        break;  
    case 'task/delete':
        // require 'includes/task/delete.php';
        $task->delete();
        break;
    case 'login': 
        require 'pages/login.php';
        break;
    case 'signup': 
        require 'pages/signup.php';
        break;
    case 'logout':
        // require 'pages/logout.php';
        $auth->logout();
        break;
    default:
        require 'pages/home.php';
        break;
}