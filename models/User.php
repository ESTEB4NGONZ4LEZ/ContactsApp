<?php

    // * Definimos nuestro namespace.
    namespace Models;
    // * Creamos nuestra clase.
    class User{
        // * Creamos nuestras propiedades.
        protected static $conn;
        private $id;
        private $name;
        private $email;
        private $password;
        // * Creamos nuestro constructor.
        public function __construct($args = []){
            $this -> id = $args['id'] ?? '';
            $this -> name = $args['name'] ?? '';
            $this -> email = $args['email'] ?? '';
            $this -> password = $args['password'] ?? '';   
        }

        // ! Creamos nuestras funciones

        // ? Funcion para darle conexion a nuestra clase.
        public static function setConn($connDb){
            self::$conn = $connDb;
        }
        //  ? Funcion para obtener un usuario mediante su email.
        public function getUser($email){
            $statement = self::$conn -> prepare("SELECT * FROM users WHERE email = :email");
            $statement -> execute([':email' => $email]);
            return $statement -> fetch();
        }
        // ? Funcion para registrar un usuario.
        public function addUser($name, $email, $password){
            $statement = self::$conn -> prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $statement -> execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_BCRYPT)
            ]);
        }

    }

?>