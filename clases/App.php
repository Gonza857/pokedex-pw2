<?php

require_once "Database.php";

class App
{
    private Database $database;
    private string $carpetaImagenes = 'imagenes-pokemon/';

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "pokedex");
    }

    public function getPokemones()
    {
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
                "imagen" => $p["IMAGEN"],
            ];
            $pokemones[] = $pokemonTraido;
        }
        $this->database->cerrarSesion();
        return $pokemones;
    }

    public function getPokemon($id): array
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("SELECT * FROM pokemon WHERE ID_BASE = :id");
        $this->database->setParametro("id", $id);
        // $this->database->prepararQuery("SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);
        $this->database->ejecutarConsulta();
        $pokemonDb = $this->database->fetchSingleAssoc();
        $pokeArmado = [
            "id_base" => $pokemonDb["ID_BASE"],
            "codigo" => $pokemonDb["CODIGO"],
            "nombre" => $pokemonDb["NOMBRE"],
            "descripcion" => $pokemonDb["DESCRIPCION"],
            "tipos" => $pokemonDb["TIPO_POKEMON"],
            "imagen" => $pokemonDb["IMAGEN"],
        ];
        $this->database->cerrarSesion();
        return $pokeArmado;
    }

    public function getTipos(): array
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("SELECT * FROM tipo");
        $this->database->ejecutarConsulta();
        $tipos = [];
        foreach ($this->database->fetchAllAssoc() as $t) {
            $tipo = [
                "id" => $t["ID"],
                "nombre" => $t["NOMBRE"],
                "imagen" => $t["imagen"],
            ];
            $tipos[] = $tipo;
        }
        $this->database->cerrarSesion();
        return $tipos;
    }

    public function buscarPokemones(array $pokemones, string $nombre): array
    {
        $resultadosBusqueda = [];
        foreach ($pokemones as $poke) {
            if (str_contains(strtolower($poke["nombre"]), strtolower($nombre))) {
                $resultadosBusqueda[] = $poke;
            }
        }
        return $resultadosBusqueda;
    }

    public function actualizarPokemon (string $id, array $pokemon): bool {
        $this->database->iniciarConexion();
        $this->database->prepararQuery(
                   "UPDATE pokemon
                          SET NOMBRE = :nombre,
                               DESCRIPCION = :descripcion,
                               TIPO_POKEMON = :tipos,
                               CODIGO = :codigo,
                               IMAGEN = :imagen
                         WHERE ID_BASE = :idBase"
        );
        $this->database->setParametro("nombre", $pokemon["NOMBRE"]);
        $this->database->setParametro("descripcion", $pokemon["DESCRIPCION"]);
        $this->database->setParametro("tipos", $pokemon["TIPO_POKEMON"]);
        $this->database->setParametro("codigo", $pokemon["CODIGO"]);
        $this->database->setParametro("imagen", $pokemon["IMAGEN"]);
        $this->database->setParametro("idBase", $id);
        $pudoEjecutarse = $this->database->ejecutarConsulta();
        $this->database->cerrarSesion();
        return $pudoEjecutarse;
    }

    public function getPokemonConTipo(string $id): array
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                    SELECT *
                    FROM pokemon p
                    JOIN tipo t ON p.TIPO_POKEMON = t.ID
                    WHERE p.ID_BASE = :idBase");
        $this->database->setParametro("idBase", $id);
        $this->database->ejecutarConsulta();
        $pokemonDb = $this->database->fetchSingleAssoc();
        $pokeArmado = [
            "id_base" => $pokemonDb["ID_BASE"],
            "codigo" => $pokemonDb["CODIGO"],
            "nombre" => $pokemonDb["NOMBRE"],
            "descripcion" => $pokemonDb["DESCRIPCION"],
            "tipos" => $pokemonDb["TIPO_POKEMON"],
            "imagen" => $pokemonDb["IMAGEN"],
            "tipoImagen" => $pokemonDb["imagen"],
        ];
        $this->database->cerrarSesion();
        return $pokeArmado;
    }
}