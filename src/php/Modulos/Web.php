<?php

namespace Jorge\Modulos;

use Jorge\Modulos\Web\appInit;
use Jorge\Modulos\Web\checkRoute;
use Jorge\Modulos\Web\initRoute;
use Jorge\Modulos\Web\initDisplay;
use Jorge\Modulos\WebRoute;

// Sera la encarga de encapsular las clases del sistema como las rutas y modulos controladores.
final class Web
{
    public static $loged = false;

    use appInit,
        initRoute,
        checkRoute,
        initDisplay;

    /**
     *
     * @var WebRoute
     */
    private $Route;

    public function __construct()
    {
        $this->initApp();
        $this->initRoute();
        $this->checkRoute();
        $this->initDisplay();
    }

    /**
     * 
     * @return WebRoute
     */
    public function getRoute()
    {
        return $this->Route;
    }
}
