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

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $sql = "SELECT * FROM users where email = :email";
    // prepare
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
        'email' => $email
    ]);
    // fetch (eat)
    $user = $query->fetch();

    if ( empty( $name ) || empty($email) || empty($password) || empty($confirm_password)  ) {
        $error = 'All fields are required';
    } else if ( $password !== $confirm_password ) {
        $error = 'The password is not match.';
    } else if ( strlen( $password ) < 8 ) {
        $error = "Your password must be at least 8 characters";
    } else if($user){
        $error = "The email you iserted has already been used by another user. Please insert another email.";
    }else {
        // recipe
        $sql = "INSERT INTO users ( `name`, `email`, `password` )
            VALUES (:name, :email, :password)";
        // prepare
        $query = $database->prepare( $sql );
        // execute
        $query->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash( $password, PASSWORD_DEFAULT ) // convert user's password to random string
        ]);

        // redirect user back to /
        header("Location: /login");
        exit;
    }
    if ( isset( $error ) ) {
        // store the error message in session
        $_SESSION['error'] = $error;
        // redirect the user back to /signup
        header("Location: /signup");
        exit;
    }