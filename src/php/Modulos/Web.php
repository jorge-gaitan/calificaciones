<?php

namespace Jorge\Modulos;

use Jorge\Modulos\Web\appInit;

// Sera la encarga de encapsular las clases del sistema como las rutas y modulos controladores.
class Web
{
    use appInit;

    public function __construct()
    {
        $this->initApp();
    }
}
