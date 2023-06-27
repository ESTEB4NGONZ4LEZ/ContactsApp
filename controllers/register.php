<?php

    require_once '../app.php';
    use Models\User;

    $userObj = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userObj -> getUser($email);
        
        if($user == false){

            $userObj -> addUser($name, $email, $password);
            $user = $userObj -> getUser($email);

            session_start();
            unset($user['password']);
            $_SESSION['user'] = $user;

            header('Location: ../view/pages/home.php');
        } else {
            $error = 'The email is taken';
            header('Location: ../view/pages/register.php?error=' . $error);
            exit();
        }
    }

?>