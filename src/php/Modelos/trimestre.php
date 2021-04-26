<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class trimestre
{
    public static function agregartrimestre(string $nombre, string $universidad)
    {
        $sql = "INSERT INTO trimestre (nombre, universidad ) VALUES(:nombre, :universidad,)";

        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "universidad" => $universidad
            
        ]);
        return $stmt;
    }

    public static function gettrimestreById(int $id)
    {
        $sql = "SELECT * FROM trimestre WHERE id = ?";
        $stmt = Database::prepare_fetch_result($sql, [$id]);
        return $stmt;
    }

    public static function getListatrimestre()
    {
        $sql = "SELECT * FROM trimestre";
        $stmt = Database::prepare_fetch_all($sql);
        return $stmt;
    }

    public static function borrartrimestreById(int $id)
    {
        $sql = "DELETE FROM trimestre WHERE id = ?";
        $stmt = Database::prepare_execute($sql, [$id]);
        return $stmt;
    }

    public static function updateNombretrimestre(int $id, string $nombre)
    {
        $sql = "UPDATE trimestre SET nombre = :nombre WHERE id = :id";
        $stmt = Database::prepare_execute($sql, [
            "nombre" => $nombre,
            "id" => $id
        ]);
    }
}
