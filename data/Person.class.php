<?php


class Person {


    private $id;
    private $name;
    private $email;
    private $skills = [];
        



    function __construct($id,$name,$email,$skills = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->skills = $skills;
    }

    public function setSkills($skills){
        $this->skills = $skills;
    }

   

}
