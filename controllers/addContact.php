<?php 

    require_once '../app.php';
    use Models\Contact;

    session_start();

    if(empty($_SESSION['user'])){
        header('Location: ../../index.php');
    }

    $contactObj = new Contact();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $user_id = $_SESSION['user']['id'];

        $contactObj -> addContact($name, $phone_number, $user_id);

        header('Location: ../view/pages/home.php');
    }

?>