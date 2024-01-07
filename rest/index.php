<?php

require_once "../data/PersonService.php";


$database = new DatabaseConnection();

$service = new PersonService($database);

$data = $service->getAll(true);



echo json_encode($data);