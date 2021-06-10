<?php

namespace Jorge\Pages;


use Jorge\Modelos\estudiante;
use Jorge\Modelos\estudiantes as ModelosEstudiantes;
use Jorge\Modelos\carrera;
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
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->listaCarreras = carrera::getListacarrera();
        $this->listaEstudiantes = ModelosEstudiantes::getListaestudiantes();
        $this->setVar('listaEstudiantes', $this->listaEstudiantes);
        $this->setVar('listaCarreras', $this->listaCarreras);
    }

    public function CheckPost()
    {

        $AgregarEstudiante = ($this->getPostInt('agregarestudiantes') ?: $this->getPost('agregarestudiantes'));
        $borrar = $this->getPostInt('id_borrado');

        if ($borrar) {
            ModelosEstudiantes::borrarestudiantesById($borrar);
            $this->setVar('borrado', $borrar);
        }

        if ($AgregarEstudiante === 'true') {
            $nombreEstudiante = $this->getPost('nombreEstudiante');
            $id_carrera = $this->getPostInt('carrera');
            ModelosEstudiantes::agregarestudiantes($nombreEstudiante, $id_carrera);
            $this->setVar('nuevaestudiantes', true);
        } else  if (is_int($AgregarEstudiante)) {
            $id_estudiante = $AgregarEstudiante;
            $nombreEstudiante = $this->getPost('nombreEstudiante');
            $id_carrera = $this->getPostInt('carrera');

            ModelosEstudiantes::updateestudiantes($id_estudiante, $nombreEstudiante, $id_carrera);
            $this->setVar('update', true);
        }
    }
}
