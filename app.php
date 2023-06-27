<?php 
    require_once 'vendor/autoload.php';

    use App\Database;
    use Models\User;
    use Models\Contact;
    
    $db = new Database();
    $conn = $db -> getConnection('mysql');

    User::setConn($conn);   
    Contact::setConn($conn); 
    
    