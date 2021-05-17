<?php

namespace Jorge\Pages;

use Jorge\Modelos\calificaciones as ModelosCalificaciones;
use Jorge\Modulos\Page;


final class Calificaciones extends Page
{

   private $listaCalificaciones = [];

   public function __construct()
   {
      parent::__construct("Calificaciones", "calificaciones.twig");
   }

   public function setUp()
   {
   }

   public function initVars()
   {
      $this->listaCalificaciones = ModelosCalificaciones::getListacalificaciones();
      $this->setVar('listaCalificaciones', $this->listaCalificaciones);
   }

   public function CheckPost()
   {
      //
   }
}
