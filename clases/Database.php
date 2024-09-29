<?php

class Database
{

    private $conexion;
    private $host;
    private $username;
    private $password;
    private $database;

    private $stmt = null;

    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    /**
     * Iniciar la conexión.
     */
    public function iniciarConexion(): void
    {
        $p = "mysql:host={$this->host};dbname={$this->database}";
        $this->conexion = new PDO($p, $this->username, $this->password) or die("Error en la conexion");
    }

    /**
     * Obtener la conexión de la base de datos.
     * @return mixed
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * Realiza FetchAll asociativo sobre la consulta realizada.
     * @return array con los resultados si es que se obtuvieron. Caso contrario array vacio.
     */
    public function fetchAllAssoc(): array
    {
        if ($this->stmt) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function fetchSingleAssoc(): array
    {
        if ($this->stmt) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return [];
    }

    /**
     * Cierra conexión con la base de datos.
     * @return void
     */
    public function cerrarSesion(): void
    {
        $this->conexion = null;
    }

    /**
     * Prepara consulta para ejecutar
     * @return void
     */
    public function prepararQuery($query): void
    {
        $this->stmt = $this->conexion->prepare($query);
    }

    /**
     * Ejecuta consulta.
     * @return true si se ejecutó correctamente. False si no se ejecutó.
     */
    public function ejecutarConsulta(): bool
    {
        if ($this->stmt) {
            return $this->stmt->execute();
        }
        return false;
    }

    public function setParametro(string $columna, string $valor) {
        $this->stmt->bindParam(":{$columna}", $valor);
    }


}


?>
