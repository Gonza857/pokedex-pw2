<?php

use JetBrains\PhpStorm\NoReturn;

require_once "Database.php";

class App
{
    private Database $database;
    private string $carpetaImagenes = 'imagenes-pokemon/';

    public function __construct()
    {
        $this->database = new Database("localhost", "root", "", "pokedex");
    }

    public function getPokemones(): array
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                SELECT pokemon.*,
                t.imagen as tipoImagen,
                t.NOMBRE as tipoNombre
                FROM pokemon
                JOIN tipo t ON pokemon.TIPO_POKEMON = t.ID");
        $this->database->ejecutarConsulta();
        $pokemones = [];
        foreach ($this->database->fetchAllAssoc() as $p) {
            $pokemonTraido = [
                "id_base" => $p["ID_BASE"],
                "codigo" => $p["CODIGO"],
                "nombre" => $p["NOMBRE"],
                "descripcion" => $p["DESCRIPCION"],
                "tipos" => $p["tipoImagen"],
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
        $this->database->prepararQuery("
                    SELECT pokemon.*,
                    t.imagen as tipoImagen
                    FROM pokemon 
                    JOIN tipo t ON pokemon.TIPO_POKEMON = t.ID
                    WHERE pokemon.ID_BASE = :id");
        $this->database->setParametro("id", $id);
        // $this->database->prepararQuery("SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);
        $this->database->ejecutarConsulta();
        $pokemonDb = $this->database->fetchSingleAssoc();
        $pokeArmado = [
            "id_base" => $pokemonDb["ID_BASE"],
            "codigo" => $pokemonDb["CODIGO"],
            "nombre" => $pokemonDb["NOMBRE"],
            "descripcion" => $pokemonDb["DESCRIPCION"],
            "tipos" => $pokemonDb["tipoImagen"],
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

    public function actualizarPokemon(string $id, array $pokemon): bool
    {
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
                    SELECT pokemon.*,
                    t.imagen as tipoImagen
                    FROM pokemon
                    JOIN tipo t ON pokemon.TIPO_POKEMON = t.ID
                    WHERE pokemon.ID_BASE = :idBase");
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
            "tipoImagen" => $pokemonDb["tipoImagen"],
        ];
        $this->database->cerrarSesion();
        return $pokeArmado;
    }

    public function eliminarPokemon(string $idEliminar): bool
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                     DELETE from pokemon
                     WHERE ID_BASE = :id");
        $this->database->setParametro("id", $idEliminar);
        $resultado = $this->database->ejecutarConsulta();
        $this->database->cerrarSesion();
        return $resultado;
    }

    public function altaPokemon(array $newPoke): bool
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                     INSERT INTO pokemon (CODIGO, NOMBRE, DESCRIPCION, TIPO_POKEMON, IMAGEN)
                     VALUES (:codigo, :nombre, :descripcion, :tipos, :imagen)");
        $this->database->setParametro("codigo", $newPoke["CODIGO"]);
        $this->database->setParametro("nombre", $newPoke["NOMBRE"]);
        $this->database->setParametro("descripcion", $newPoke["DESCRIPCION"]);
        $this->database->setParametro("tipos", $newPoke["TIPO_POKEMON"]);
        $this->database->setParametro("imagen", $newPoke["IMAGEN"]);
        $resultado = $this->database->ejecutarConsulta();
        $this->database->cerrarSesion();
        return $resultado;
    }

    public function altaUsuario (string $username, string $email, string $pass) : bool
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                INSERT INTO usuario (username, password, correo) 
                VALUES (:username, :pass, :correo)");

        $this->database->setParametro("username", $username);
        $this->database->setParametro("pass", $pass);
        $this->database->setParametro("correo", $email);

        $resultado = $this->database->ejecutarConsulta();
        $this->database->cerrarSesion();
        return $resultado;
    }
    #[NoReturn] public function redirigirConError(string $mensaje, string $ruta): void
    {
        $_SESSION["error-mensaje"] = $mensaje;
        header("Location: " . $ruta);
        exit();
    }

    public function getUsuario(string $correo) : array
    {
        $this->database->iniciarConexion();
        $this->database->prepararQuery("SELECT * FROM usuario WHERE correo = :correo");
        $this->database->setParametro("correo", $correo);
        $this->database->ejecutarConsulta();
        $resultado = $this->database->fetchSingleAssoc();
        $this->database->cerrarSesion();
        return $resultado;
    }

    public function setearTokenAlUsuario(array $usuario): false|string
    {
        $token = bin2hex(random_bytes(16));
        $this->database->iniciarConexion();
        $this->database->prepararQuery("
                    UPDATE usuario 
                    SET token = :token 
                    WHERE id_usuario = :idUsuario");
        $this->database->setParametro("idUsuario", $usuario["id_usuario"]);
        $this->database->setParametro("token", $token);
        $pudo = $this->database->ejecutarConsulta();
        $this->database->cerrarSesion();
        if ($pudo) {
            return $token;
        }
        return false;
    }

    public function limpiarInput(mixed $param): string
    {
        return htmlspecialchars(strip_tags(trim($param)));

    }


}