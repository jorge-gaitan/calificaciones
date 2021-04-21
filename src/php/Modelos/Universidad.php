<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class Universidad
{
    public static function agregarUniversidad(string $nombre, string $municipio, string $direccion, string $telefono)
    {
        $sql = "INSERT INTO universidad (nombre, municipio, direccion, telefono) VALUES(:nombre, :municipio, :direccion, :telefono)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "municipio" => $municipio,
            "direccion" => $direccion,
            "telefono" => $telefono
        ]);
        return $stmt;
    }

    public static function getUniversidadById(int $id)
    {
        $sql = "SELECT * FROM universidad WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListaUniversidades()
    {
        $sql = "SELECT * FROM universidad";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrarUniversidadById(int $id)
    {
        $sql = "DELETE FROM universidad WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombreUniversidad(int $id, string $nombre)
    {
        $sql = "UPDATE universidad SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}
