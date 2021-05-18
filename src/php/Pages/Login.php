<?php

namespace Jorge\Pages;

use Jorge\Funciones;
use Jorge\Modelos\Usuarios;
use Jorge\Modulos\Cookies;
use Jorge\Modulos\Page;
use Jorge\Modulos\Web;

final class Login extends Page
{
    public function __construct()
    {
        parent::__construct("Iniciar sesión", "login.twig");
    }

    public function setUp()
    {
        if (Web::$loged) {
            Funciones::redirect('./inicio');
        }
    }

    public function initVars()
    {
    }

    public function CheckPost()
    {
        $user = $this->getPost('username');
        $password = $this->getPost('password');

        $userData = Usuarios::comprobarUsuario($user, $password);
        if ($userData) {
            $token = uniqid();
            Usuarios::registrarSesion($userData->id_usuario, $token);
            $cookies = new Cookies('sistemanotas');
            $cookies->setCookie('user', $token);
            Web::$loged = $userData;
            Funciones::redirect('./inicio');
        }
    }
}
