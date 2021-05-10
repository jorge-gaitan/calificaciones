<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class estudiantes
{
    public static function agregarestudiantes(string $id_estudiante, string $id_carrera, string $nombre)
    {
        $sql = "INSERT INTO universidad (id_estudiantes,id_carrera,nombre) VALUES(:id_estudiantes, :id_carrera, :nombre)";

        $stmt = Database::prepare_execute($sql, [
            "id_estudiante" => $id_estudiante,
            "id_carrera" => $id_carrera,
            "nombre" => $nombre,
            
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
        $sql = "DELETE FROM estudiantes WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombreestudiantes(int $id, string $nombre)
    {
        $sql = "UPDATE estudiantes SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}