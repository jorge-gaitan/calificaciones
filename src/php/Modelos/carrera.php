<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class carrera
{
    public static function agregarcarrera(string $nombre)
    {
        $sql = "INSERT INTO `carrera` (`nombre`) VALUES (:nombre)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre
        ]);
        return $stmt;
    }

    public static function getcarreraById(int $id)
    {
        $sql = "SELECT * FROM carrera WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListacarrera()
    {
        $sql = "SELECT * FROM carrera";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrarcarreraById(int $id)
    {
        $sql = "DELETE FROM carrera WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombreUniversidad(int $id, string $nombre, string $universidad)
    {
        $sql = "UPDATE carrera SET nombre = :nombre, universidad = :universidad WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "universidad" => $universidad,
            "id" => $id
        ]);
        return $stmt;
    }

    public static function updateNombre(int $id, string $nombre)
    {
        $sql = "UPDATE carrera SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
        return $stmt;
    }


    public static function updateUniversidad(int $id, string $universidad)
    {
        $sql = "UPDATE carrera SET universidad = :universidad WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "universidad" => $universidad,
            "id" => $id
        ]);
        return $stmt;
    }
}
