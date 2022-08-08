<?php
require_once 'config/config.php';


/* Se crea una clase que se llame db */
class DB{
    /* variables privadas */
    private $host;
    private $db;
    private $user;
    private $pass;
    /* variable publica */
    public $conection;

    public function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->db = constant('DB');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        //Conexion a MYSQL
        try{
            $this->conection=new PDO('mysql:host='.$this->host.'; dbname='. $this->db, $this->user, $this->pass );
        }
        catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }

    }//Cierre de constructor

}//fin de la clase DB


?>