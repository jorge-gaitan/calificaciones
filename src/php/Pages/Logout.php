<?php

namespace Jorge\Pages;

use Jorge\Funciones;
use Jorge\Modelos\Usuarios;
use Jorge\Modulos\Cookies;
use Jorge\Modulos\Page;
use Jorge\Modulos\Web;

final class Logout extends Page
{
    public function __construct()
    {
        parent::__construct("Salir", "base.twig");
    }

    public function setUp()
    {
    }

    public function initVars()
    {
        $user = Web::$loged;
        Usuarios::borrarSesion($user->id_usuario);
        $cookie = new Cookies('sistemanotas');
        $cookie->delCookie('user');
        Funciones::redirect('./login');
    }

    public function CheckPost()
    {
    }
}
