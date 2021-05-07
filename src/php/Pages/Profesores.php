<?php

namespace Jorge\Pages;

use Jorge\Modelos\Profesor;
use Jorge\Modulos\Page;

final class profesores  extends   Page
{
    private $listaProfesores = [];

    // El constructor invoca la clase Page que necesita el nombre de la pagina y el archivo de la plantilla
    public function __construct()
    {
        parent::__construct("Profesores", "Profesores.twig");
    }

    // En algun momento va necesitar iniciar compontenes
    // esta funcion se llama despues de construir la clase,
    public function setUp()
    {
        $this->listaProfesores = profesor::getListaProfesor();
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->setVar('listaProfesores', $this->listaProfesores);
    }

    public function CheckPost()
    {
        //
    }
}
