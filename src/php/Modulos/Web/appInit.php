<?php

namespace Jorge\Modulos\Web;

use Jorge\Modelos\Usuarios;
use Jorge\Modulos\Cookies;
use Jorge\Modulos\Database\DatabaseConfig;
use Jorge\Modulos\Database;
use Jorge\Modulos\Web;

trait appInit
{
    public function initApp(): void
    {
        DatabaseConfig::init();
        Database::init();
        $cookie = new Cookies('sistemanotas');
        if ($cookie->getCookie('user')) {
            $login = Usuarios::getUsuarioByToken($cookie->getCookie('user'));
            Web::$loged = $login;
        }
    }
}
