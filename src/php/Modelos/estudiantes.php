<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class estudiantes
{
    public static function agregarestudiantes(string $nombre, int $id_carrera)
    {
        $sql = "INSERT INTO `estudiantes` ( `id_carrera`, `nombre`) VALUES (:id_carrera, :nombre)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id_carrera" => $id_carrera
        ]);
        return $stmt;
    }

    public static function getestudiantesById(int $id)
    {
        $sql = "SELECT * FROM estudiantes WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListaestudiantes()
    {
        $sql = "SELECT 
          estude.*,
          car.nombre AS nombreCarrera
          FROM estudiantes AS estude
          INNER JOIN carrera AS car ON estude.id_carrera = car.id            ";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrarestudiantesById(int $id)
    {
        $sql = "DELETE FROM estudiantes WHERE id_estudiante = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateestudiantes(int $id,  string $nombre, int $id_carrera)
    {
        $sql = "UPDATE estudiantes SET nombre = :nombre, id_carrera = :id_carrera WHERE id_estudiante = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id_carrera" => $id_carrera,
            "id" => $id
        ]);
    }
}
