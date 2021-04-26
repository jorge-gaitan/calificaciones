<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class profesor
{
    public static function agregarprofesor(string $nombre, string $carrera)
    {
        $sql = "INSERT INTO profesor (nombre, carrera ) VALUES(:nombre, :carrera,)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "carrera" => $carrera
        ]);
        return $stmt;
    }

    public static function getprofesorById(int $id)
    {
        $sql = "SELECT * FROM profesor WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListaprofesor()
    {
        $sql = "SELECT * FROM profesor";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrarprofesorById(int $id)
    {
        $sql = "DELETE FROM profesor WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombreprofesor(int $id, string $nombre)
    {
        $sql = "UPDATE profesor SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}
