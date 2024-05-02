<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*$conexion = mysqli_connect("127.0.0.1:3306","root","","mydb");
if($conexion){
    echo 'Conexión exitosa';
}else{
    echo 'Conexión fallida';
}
*/

    class Connection extends Mysqli{
        public function __construct(?string $hostname = 'localhost', ?string $username = 'root', ?string $password = '', ?string $database = 'Reminders', ?int $port = 1433)
        {
            parent::__construct($hostname, $username, $password, $database, $port);
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'DB Conectada' : die('Error al conectarse a la BD');
        }
    }

?>