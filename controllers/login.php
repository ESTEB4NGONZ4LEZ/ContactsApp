<?php

    require_once '../app.php';
    use Models\User;

    $userObj = new User();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userObj -> getUser($email);

        if($user == false){
            $error = 'Invalid Credentials';
            header('Location: ../view/pages/login.php?error=' . $error);
        } else{
            if(!password_verify($password, $user['password'])){
                $error = 'Invalid Credentials';
                header('Location: ../view/pages/login.php?error=' . $error);
            } else{
                session_start();
                unset($user['password']);
                $_SESSION['user'] = $user;
    
                header('Location: ../view/pages/home.php');
            }

        }
    }

?>