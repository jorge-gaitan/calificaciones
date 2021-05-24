<?php

namespace Jorge\Pages;

use Jorge\Modelos\Asignatura;
use Jorge\Modelos\carrera;
use Jorge\Modulos\Page;

final class asignaturas extends  Page
{
    private $listaAsignaturas = [];

    // El constructor invoca la clase Page que necesita el nombre de la pagina y el archivo de la plantilla
    public function __construct()
    {
        parent::__construct("Asignaturas", "asignaturas.twig");
    }


    public function setUp()
    {
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->listaCarreras = carrera::getListacarrera();
        $this->listaAsignaturas = asignatura::getListaasignatura();
        $this->setVar('listaAsignaturas', $this->listaAsignaturas);
        $this->setVar('listaCarreras', $this->listaCarreras);
    }

    public function CheckPost()
    {
        $agregarAsignatura = ($this->getPostInt('agregarAsignatura') ?: $this->getPost('agregarAsignatura'));
        $borrar = $this->getPostInt('id_borrado');

        if ($borrar) {
            asignatura::borrarasignaturaById($borrar);
            $this->setVar('borrado', $borrar);
        }

        if ($agregarAsignatura === 'true') {
            $nombreAsignatura = $this->getPost('nombreAsignatura');
            $id_carrera = $this->getPostInt('carrera');
            asignatura::agregarasignatura($nombreAsignatura, $id_carrera);
            $this->setVar('nuevaasignatura', true);
        } else if (is_int($agregarAsignatura)) {
            $id_asignatura = $agregarAsignatura;
            $nombreAsignatura = $this->getPost('nombreAsignatura');
            $id_carrera = $this->getPostInt('carrera');

            asignatura::updateAsignatura($id_asignatura, $nombreAsignatura, $id_carrera);
            $this->setVar('update', true);
        }
    }
}
