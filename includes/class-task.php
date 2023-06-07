<?php

class Task
{
    public function add()
    {
        // init DB class
        $db = new DB();

        $task_name = $_POST['task_name'];

        if(empty($task_name)){
            $error = "ERROR";
        }

        if(isset($error)){
            $_SESSION['error'] = $error;
            header("Location: / ");
            exit;
        }

        $sql = 'INSERT INTO todolist (`task`,`completed`) VALUES(:task,:completed)';
        $db->insert(
            $sql,
            [
                'task' => $task_name,
                'completed' => 0
            ]
        );

        header("Location: /");
        exit;
    
        
    }

    public function completed()
    {
        // init DB class
        $db = new DB();

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
            $db->update(
                $sql,
                [
                    'completed' => $task_completed,
                    'id' => $task_id
                ]
            );
            header("Location: /");
            exit;
        }
    }

    public function delete()
    {
        // init DB class
        $db = new DB();

        $task_id = $_POST['task_id'];

        if(empty($task_id)){
            echo "ERROR";
        }else{
            $sql = 'DELETE FROM todolist WHERE id =:id ';
            $db->delete(
                $sql,
                [
                    'id' => $task_id
                ]
            );
            header("Location: /");
            exit;
        }
    }
}