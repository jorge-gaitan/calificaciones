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
}
