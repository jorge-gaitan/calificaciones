<?php

namespace Jorge\Modelos;

use Jorge\Modulos\Database;

final class Usuarios
{
    public static function registrarUsuario(string $nombre_usuario, string $password)
    {
        $passwrd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `usuarios` (`nombre_usuario`, `password`) VALUES (:nombre_usuario, :password)";
        $stmt = Database::prepare_execute($sql, [
            "nombre_usuario" => $nombre_usuario,
            "password" => $passwrd
        ]);
        return $stmt;
    }

    public static function comprobarUsuario(string $user, string $password)
    {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :username";
        $stmt = Database::prepare_fetch_result($sql, [
            'username' => $user
        ]);
        if ($stmt) {
            $passwrd = $stmt->password;
            return (password_verify($password, $passwrd) ? $stmt : false);
        }
        return false;
    }

    public static function registrarSesion(int $id_usuario, string $token)
    {
        $sql = "INSERT INTO sesiones_usuarios (id_usuario, token) VALUES (:id_usuario, :token)";
        $stmt = Database::prepare_execute($sql, [
            'id_usuario' => $id_usuario,
            'token' => $token
        ]);
        return $stmt;
    }

    public static function getUsuarioByToken(string $token)
    {
        $sql = "SELECT id_usuario FROM sesiones_usuarios WHERE token = ?";
        $stmt = Database::prepare_fetch_result($sql, [
            $token
        ]);
        if ($stmt) {
            $user = Database::prepare_fetch_result("SELECT * FROM usuarios WHERE id_usuario = ?", [
                $stmt->id_usuario
            ]);
            return $user;
        }
        return false;
    }
}
