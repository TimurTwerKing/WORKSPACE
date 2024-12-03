<?php
require_once "./AsignaturaPDO.php";


$nombre = $_GET['nombre'];

$asignaturaPDO = new AsignaturaPDO("localhost", "colegio", "root", "");
$asignaturaPDO->insert($nombre);

print_r($asignaturaPDO->getAll());
