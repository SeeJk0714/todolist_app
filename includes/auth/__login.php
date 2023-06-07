<?php

    $database = connectToDB();

    $email = $_POST["email"];
    $password = $_POST["password"];

    // 1. make sure all fields are not empty
    if ( empty($email) || empty($password) ) {
        $error = 'All fields are required';
    } else {
        // retrieve the user based on the email provided
        // recipe
        $sql = "SELECT * FROM users where email = :email";
        // prepare
        $query = $database->prepare( $sql );
        // execute
        $query->execute([
            'email' => $email
        ]);
        // fetch (eat)
        $user = $query->fetch(); // fetch() will only return one row of data

        // make sure the email provided is in the database
        if ( empty( $user ) ) {
            $error = "The email provided does not exists";
        } else {
            // make sure password is correct
            if ( password_verify( $password, $user["password"] ) ) {
                // if password is valid, set the user session
                $_SESSION["user"] = $user;

                header("Location: /");
                exit;
            } else {
                // if password is incorrect
                $error = "The password provided is not match";
            }
        }

    }
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header("Location: /login");
        exit;
    }
    