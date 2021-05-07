<?php

namespace Jorge\Pages;

use Jorge\Modelos\Asignatura;
use Jorge\Modulos\Page;

final class asignaturas extends  Page
{
    private $listaAsignaturas = [];

    // El constructor invoca la clase Page que necesita el nombre de la pagina y el archivo de la plantilla
    public function __construct()
    {
        parent::__construct("Asignaturas", "asignaturas.twig");
    }

    // En algun momento va necesitar iniciar compórtense
    // esta funcion se llama despues de construir la clase,
    public function setUp()
    {
        $this->listaAsignaturas = asignatura::getListaasignatura();
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->setVar('listaAsignaturas', $this->listaAsignaturas);
    }

    public function CheckPost()
    {
        //
    }




}

