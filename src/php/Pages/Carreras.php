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

    public function setUp()
    {
    }

    // Esta funcion se usa para cargar variables en la plantilla
    public function initVars()
    {
        $this->listaCarreras = carrera::getListacarrera();
        $this->setVar('listaCarreras', $this->listaCarreras);
    }

    public function CheckPost()
    {
        $agregarCarrera = ($this->getPostInt('agregarCarrera') ?: $this->getPost('agregarCarrera'));
        $borrar = $this->getPostInt('id_borrado');
        if ($borrar) {
            carrera::borrarcarreraById($borrar);
            $this->setVar('borrado', $borrar);
        }

        // Entra al bloque de borrado
        if ($agregarCarrera === 'true') {
            $nombreCarrera = $this->getPost('nombreCarrera');
            carrera::agregarcarrera($nombreCarrera);
            $this->setVar('nuevaCarrera', true);
        } else if (is_int($agregarCarrera)) {
            // Entra al bloque de edición
            $id_carrera = $agregarCarrera;
            $nombreCarrera = $this->getPost('nombreCarrera');
            carrera::updateCarrera($id_carrera, $nombreCarrera);
            $this->setVar('update', true);
        }
    }
}
