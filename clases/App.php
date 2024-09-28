<?php

require_once "Database.php";

class App {
    private Database $database;
    private $carpetaImagenes = 'imagenes-pokemon/';
    public function __construct() {
    $this->database = new Database("localhost", "root", "", "pokedex");
    }

    public function getPokemones() {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("SELECT * FROM pokemon");
        $this->database->ejecutarConsulta();
        $pokemones = [];
        foreach ($this->database->fetchAllAssoc() as $p) {
            $pokemonTraido = [
                "id_base" => $p["ID_BASE"],
                "codigo" => $p["CODIGO"],
                "nombre" => $p["NOMBRE"],
                "descripcion" => $p["DESCRIPCION"],
                "tipos" => $p["TIPO_POKEMON"],
                "imagen" => $this->carpetaImagenes . $p["IMAGEN"],
            ];
            $pokemones[] = $pokemonTraido;
        }
        $this->database->cerrarSesion();
        return $pokemones;
    }
}