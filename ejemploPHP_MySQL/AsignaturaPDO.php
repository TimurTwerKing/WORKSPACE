<?php

class AsignaturaPDO
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
    public function getAll()
    {
        $query = "SELECT * FROM asignatura";

        try {
            $statement = $this->connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception(
                "Error en la consulta select de asignatura\n" .
                    $e->getMessage() . "\n" .
                    $e->getTraceAsString()
            );
        }
    }

    public function insert($nombre) {
        // Escribir la consulta con los placeholders
        $query = "INSERT INTO asignatura (nombre) VALUES (:nombre)";

        // Preparar la consulta
        $statement = $this->connection->prepare($query);

        // Sustituir los placeholders
        $statement->bindParam(":nombre", $nombre);

        try {
            // Ejecutar la query
            $statement->execute();
        } catch (PDOException $e) {
            throw new Exception(
                "Error en la consulta insert de asignatura\n" .
                    $e->getMessage() . "\n" .
                    $e->getTraceAsString()
            );
        }
        
    }
}
