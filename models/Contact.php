<?php
    // * Definimos nuestro namespace.
    namespace Models;
    // * Creamos nuestra clase.
    class Contact{
        // * Creamos nuestras propiedades.
        protected static $conn;
        private $id;
        private $name;
        private $user_id;
        private $phone_number;
        // * Creamos nuestro constructor.
        public function __construct($args = []){
            $this -> id = $args['id'] ?? '';
            $this -> name = $args['name'] ?? '';
            $this -> user_id = $args['user_id'] ?? '';
            $this -> phone_numer = $args['phone_numer'] ?? '';   
        }

        // ! Creamos nuestras funciones.

        // ? Funcion para darle conexion a nuestra clase.
        public static function setConn($connDb){
            self::$conn = $connDb;
        }

        // ? Funcion para agregar un contacto
        public function addContact($name, $phone_number, $user_id){
            $statement = self::$conn -> prepare("INSERT INTO contacts (name, user_id, phone_number) VALUES (:name, :user_id, :phone_number)");
            $statement -> execute([
                ':name' => $name,
                ':user_id' => $user_id,
                ':phone_number' => $phone_number
            ]);
        }

        // ? Funcion para traer los contactos del usuario.
        public function getContacts($user_id){
            $statement = self::$conn -> prepare("SELECT * FROM contacts WHERE user_id = :user_id");
            $statement -> execute([
                ':user_id' => $user_id
            ]);
            return $statement -> fetchAll();
        }

        // ? Funcion para traer un contacto por su id.
        public function getContact($id){
            $statement = self::$conn -> prepare("SELECT * FROM contacts WHERE id = :id");
            $statement -> execute([
                ':id' => $id
            ]);
            return $statement -> fetch();
        }

        // ? Funcion para eliminar contacto.
        public function deleteContact($id){
            $statement = self::$conn -> prepare("DELETE FROM contacts WHERE id = :id");
            $statement -> execute([
                ':id' => $id
            ]);
        }

        // ? Funcion para editar un contacto.
        public function editContact($name, $phone_number, $id){
            $statement = self::$conn -> prepare("UPDATE contacts SET name = :name, phone_number = :phone_number WHERE id = :id");
            $statement -> execute([
                ':name' => $name,
                ':phone_number' => $phone_number,
                ':id' => $id 
            ]);
        }
    }

?>