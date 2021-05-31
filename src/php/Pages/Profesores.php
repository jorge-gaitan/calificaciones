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


    public function setUp()
    {
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()

    {
        $this->listaProfesores = profesor::getListaProfesor();
        $this->setVar('listaProfesores', $this->listaProfesores);
    }

    public function CheckPost()
    {
        $agregarProfesores =($this->getPostInt('agregarProfesores') ?: $this->getPost('agregarProfesores'));
        $borrar = $this->getPostInt('id_borrado');
        if ($borrar) {
            profesor::borrarprofesorById($borrar);
            $this->setVar('borrado', $borrar);
        }

        if ($agregarProfesores === 'true') {
            $nombreProfesor = $this->getPost('nombreProfesores');
            Profesor::agregarprofesor($nombreProfesor);
            $this->setVar('nuevaProfesores', true);
        } else if ($this->getPostInt('agregarProfesores')){
            // entrar al bloque de edicion
            $idprofesor = $agregarProfesores;
            $nombreProfesor = $this->getPost('nombreProfesores');
            Profesor::updateNombreprofesor($idprofesor,$nombreProfesor);
            $this->setVar('update', true);

        }
    }
}
