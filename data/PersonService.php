<?php

require_once "DatabaseConnection.php";
require_once "Person.class.php";

class PersonService {


    private $db;
    private $connection;
    private $statement;
        



    function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
        $this->connection = $db->connect();
    }


    function getAll($isJson = false){
        $this->statement = $this->connection->prepare("SELECT e.*, GROUP_CONCAT(s.skill_name SEPARATOR ', ') as skills
        FROM php_web_service.etudiants as e
        JOIN php_web_service.etudiant_skill_pivot ON e.etudiant_id= php_web_service.etudiant_skill_pivot.etudiant_id
        JOIN php_web_service.skills as s ON php_web_service.etudiant_skill_pivot.skill_id= s.skill_id
        GROUP BY e.etudiant_id;");
        // $this->statement->bindValue($param,$value,$type);
        $this->statement->execute();
        $data = $this->statement->fetchAll();

        $this->db->disConnect();

        $temp_data = [];
        foreach ($data as $d) {
            
            $skillsArray = ($d['skills']) ? explode(', ', $d['skills']) : [];

            array_push(
                $temp_data,
                [
                    "etudiant_id" => $d["etudiant_id"],
                    "name" => $d["name"],
                    "email" => $d["email"],
                    "skills" => $skillsArray
                ]
                );
        }

        $data = $temp_data;

        if ($isJson){
            return $data;
        }


        $persons = [];

        foreach ($data as $val) {
            $person = new Person($val["etudiant_id"],$val["name"],$val["email"],$val["skills"]);
            array_push($persons,$person);
        }


        return $persons;
    }

   

}
