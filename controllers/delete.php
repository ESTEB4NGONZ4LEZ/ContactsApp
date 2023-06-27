<?php 

    require_once '../app.php';
    use Models\Contact;

    session_start();

    if(empty($_SESSION['user'])){
        header('Location: ../../index.php');
    }

    $contatcObj = new Contact();

    $id = $_GET['id'];

    $contatc = $contatcObj -> getContact($id); 
    
    if($contatc == false){
        http_response_code(404);
        echo 'HTTP 404 NOT FOUND';
        return;
    } else if ($contatc['user_id'] !== $_SESSION['user']['id']){
        http_response_code(403);
        echo "HTTP 403 UNAUTHORIZED"; 
        return;
    } else {
        $contatcObj -> deleteContact($id);
        header('Location: ../view/pages/home.php');
    }

?>
