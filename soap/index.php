<?php


require_once "../data/PersonService.php";



$options = ["uri" => "http://localhost:80/WEB_SERVICE/soap/index.php"];
$server = new SoapServer(null,$options);
$personService = new PersonService(new DatabaseConnection());
$server->setObject($personService);


if( $_SERVER["REQUEST_METHOD"] == "POST") {
    $server->handle();
} else {
    header("Content-Type: text/xml");
    echo $server->getWSDL();
}
