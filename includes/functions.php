<?php

function connectToDB() {
    $host = 'devkinsta_db';
    $dbname = 'Exercise_Todo_List_App';
    $dbuser = 'root';
    $dbpassword = 'GObT0SaYlthXkrat';

    $database = new PDO (
        "mysql:host=$host;dbname=$dbname",
        $dbuser,
        $dbpassword
    );

    return $database;
}
