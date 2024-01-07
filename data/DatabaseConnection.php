<?php

class DatabaseConnection {

    private $host = "localhost";
    private $user = "root";
    private $pass = "fares12345";
    private $dbname = "php_web_service";

    private $pdo;

    public function __construct()
    {
        try{

            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            //$this->pdo->query('use db_hotel;');

        } catch(PDOException $e){

            die('SET YOUR DATABASE : ' . $e->getMessage());

        }
    }



    public function connect(): PDO{
        return $this->pdo;
    }

    public function disConnect(){
        if($this->pdo !== null){
            $this->pdo = null;
        }
    }
    
}