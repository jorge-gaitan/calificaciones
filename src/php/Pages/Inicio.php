<?php

namespace Jorge\Pages;

use Jorge\Modelos\carrera;
use Jorge\Modulos\Page;

final class Inicio extends Page
{
    private $listaCarreras = [];

    public function __construct()
    {
        parent::__construct("Pagina de inicio", 'inicio.twig');
    }

    public function initVars()
    {
        $this->setVar('nombre', 'Jorge');
        $this->setVar('carreras.lista', $this->listaCarreras);
    }
    public function setUp()
    {
        $this->listaCarreras = carrera::getListacarrera();
    }
    public function CheckPost()
    {
    }
}
