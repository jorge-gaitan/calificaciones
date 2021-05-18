<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class calificaciones
{
    public static function getListaCalificaciones()
    {
        $sql = "SELECT 
        calif.*,
        asig.nombre AS nombreAsignatura,
        estu.nombre AS nombreEstudiante,
        prof.nombre AS nombreprofesor
        FROM calificaciones AS calif
        INNER JOIN asignatura AS asig ON calif.id_asignatura = asig.id
        INNER JOIN estudiantes AS estu ON calif.id_estudiante = estu.id_estudiante
        INNER JOIN profesor  AS prof ON calif.id_profesor = prof.id";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function agregarCalificacion(int $id_asignatura, int $id_estudiante, int $id_profesor, int $trimestre, int $nota)
    {
        $sql = "INSERT INTO `calificaciones` (`id_asignatura`, `id_estudiante`, `id_profesor`, `trimestre`, `nota`) VALUES (:id_asignatura, :id_estudiante, :id_profesor, :trimestre, :nota)";
        $stmt = Database::prepare_execute($sql, [
            "id_asignatura" => $id_asignatura,
            "id_estudiante" => $id_estudiante,
            "id_profesor" => $id_profesor,
            "trimestre" => $trimestre,
            "nota" => $nota
        ]);
        return $stmt;
    }

    public static function borrarCalificacionById(int $id)
    {
        $sql = "DELETE FROM calificaciones WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }
}
