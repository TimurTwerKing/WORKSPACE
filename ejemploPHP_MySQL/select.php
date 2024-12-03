<?php
//require_once "./AsignaturaPDO.php";
require_once "./Database.php";

//$asignaturaPDO = new AsignaturaPDO("localhost", "colegio", "root", "");

//print_r($asignaturaPDO->getAll());

$db = new Database("localhost", "colegio", "root", "");
$db->insert("asignatura", ["nombre"], ["Hola"]);

print_r($db->getAll("asignatura"));