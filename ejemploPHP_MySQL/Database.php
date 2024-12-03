<?php

class Database
{

    private $connection; // PDO


    function __construct($host, $dbname, $user, $password)
    {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        } catch (PDOException $e) {
            echo "Error en la conexión a la base de datos";
            echo "¿Has encendido el MySQL?";
            echo $e->getMessage(); // Obtener mensaje de error
            echo $e->getTraceAsString(); // Obtiene la traza del error (ficheros y líneas)
        }
    }


    /**
     * Devuelve todas las asignaturas
     * @throws \Exception si hay error en la consulta
     * @return array Registros de la tabla asignatura
     */
    public function getAll($tabla) 
    {
        $query = "SELECT * FROM $tabla";

        try {
            $statement = $this->connection->prepare($query);
            $statement->execute(); // SELECT * FROM "asignatura"

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception(
                "Error en la consulta select de $tabla" .
                    $e->getMessage() . "\n" .
                    $e->getTraceAsString()
            );
        }
    }

    public function insert($tabla, $columnas, $valores) {
        $columnasQuery = join(", ", $columnas);
        $placeholders = join(", :", $columnas);
        $query = "INSERT INTO $tabla ($columnasQuery) VALUES (:$placeholders)";
        
        
        // Preparar consulta
        $statement = $this->connection->prepare($query);

        // Sustituir parámetros
        foreach($valores as $key => $valor) {
            $statement->bindParam(":".$columnas[$key], $valor);
        }

        $statement->execute();


        // insert(persona, [nombre, apellidos, edad], [Juan, Martínez, 15])
        // INSERT INTO PERSONA (nombre, apellidos, edad) VALUES (Juan, Martínez, 15);
        
        // insert(persona, [nombre, "1; DROP DATABASE; /*", edad], [Juan, Martínez, 15])
        // INSERT INTO PERSONA (nombre, apellidos, edad) VALUES (:nombre, :apellidos, :edad);
    }
}
