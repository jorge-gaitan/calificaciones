<?php

namespace Jorge\Pages;

use Jorge\Modelos\carrera;
use Jorge\Modulos\Page;

final class Carreras extends Page
{

    private $listaCarreras = [];

    // El constructor invoca la clase Page que necesita el nombre de la pagina y el archivo de la plantilla
    public function __construct()
    {
        parent::__construct("Carreras", "carreras.twig");
    }

    // En algun momento va necesitar iniciar compontenes
    // esta funcion se llama despues de construir la clase,
    public function setUp()
    {
        $this->listaCarreras = carrera::getListacarrera();
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->setVar('listaCarreras', $this->listaCarreras);
    }

    public function CheckPost()
    {
        //
    }
}
