<?php
    // Definimos el namespace.
    namespace App;
    // Creamos la clase.
    class Database{
        // Definimos las propiedades.
        private $conn;
        protected static $settings = array(
            "mysql" => Array(
                // Le pasamos el que va a ser el motor que base de datos.
                'driver' => 'mysql',
                // Le pasamos el   host, puede ser una IP.
                'host' => 'localhost',
                // Le pasamos el usuario de la DB
                'username' => 'root',
                // Le pasamos el nombre de la DB a la que nos vamos a conectar.
                'database' => 'contacts_app',
                // Le pasamos la contrase;a.
                'password' => "",
                // Le definimos la configuracion de la intercalacion de caracteres que se va a usar en la DB, varia dependiendo de los idiomas que se manejen en la DB.
                'collation' => 'utf8mb4_spanish_ci',
                // Establecemos las opciones de configuracion para la conexion PDO.
                'flags' => [
                    // Habilita el modo de errores de PDO, lanza excepciones cuando ocurre un error.
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    // Establecemos el modo de obtencion de datos predeterminado como array asociativo.
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    // Le pasamos el juego de caracteres y la intercalacion.
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                ]
            )
        );
        // Creamos nuestro constructor.
        public function __construct($args = []) {
            // El valor que le llegue a conn de la propiedad arg se le va a asignar a la propiedad de la clase $conn.
            $this->conn = $args['conn'] ?? null;
        }
        // Creamos la funcion que nos va a permitir obtener la conexion a la base de datos, esta funcion recibira el tipo de base de datos que se usara.
        public function getConnection($dbKey) {
            // Accedemos a la propiedad $settings, le pasamos la dbKey y la almacenamos en una variable.
            $dbConfig = self::$settings[$dbKey];
            // Obtenemos la configuracion especifica de la base de datos, y los almacenamos en una variable.
            $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
            // Creamos un try cathc para obtener errores en hora de ejecucion.
            try{
                // Accedemos a la conexion y creamos una nueva conexion PDO y le pasamos el resto de parametros.
                $this->conn = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['flags']);
            }catch(\PDOException $exception){
                // Capturamos y retornamos los errores.
                $error=[[
                    'error' => $exception -> getMessage(),
                    'message' => 'Error al momento de establecer conexion'
                ]];
                return $error;
            }
            // Retornamos la conexion.
            return $this -> conn;
        } 
    }