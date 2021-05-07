<?php

namespace Jorge\Pages;


use Jorge\Modelos\estudiante;
use Jorge\Modelos\estudiantes as ModelosEstudiantes;
use Jorge\Modulos\Page;

final class estudiantes extends  Page
{
    private $listaEstudiantes = [];

    // El constructor invoca la clase Page que necesita el nombre de la pagina y el archivo de la plantilla
    public function __construct()
    {
        parent::__construct("Estudiantes", "estudiantes.twig");
    }

    // En algun momento va necesitar iniciar compórtense
    // esta funcion se llama despues de construir la clase,
    public function setUp()
    {
        $this->listaEstudiantes = ModelosEstudiantes::getListaestudiantes();
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->setVar('listaEstudiantes', $this->listaEstudiantes);
    }

    public function CheckPost()
    {
        //
    }




}

