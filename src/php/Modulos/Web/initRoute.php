<?php

namespace Jorge\Modulos\Web;

use Jorge\Modulos\WebRoute;
use Jorge\Pages;

trait initRoute
{

        /**
         *
         * @var WebRoute
         */
        private $Route;


        /**
         * 
         * @return WebRoute
         */
        public abstract function getRoute();

        private function initRoute()
        {
                $Route = new WebRoute('p', Pages\Inicio::class);

                $Inicio = new WebRoute('inicio', Pages\Inicio::class);

                $Route
                        ->addRoute($Inicio)
                        ->addRoute(new WebRoute('jorge', Pages\Jorge::class))
                        ->addRoute(new WebRoute('registro', Pages\Registro::class))
                        ->addRoute(new WebRoute('login', Pages\Login::class))
                        ->addRoute(new WebRoute('carreras', Pages\Carreras::class))
                        ->addRoute(new WebRoute('asignaturas', Pages\asignaturas::class))
                        ->addRoute(new WebRoute('profesores', Pages\profesores::class))
                        ->addRoute(new WebRoute('estudiantes', Pages\estudiantes::class))
                        ->addRoute(new WebRoute('calificaciones', Pages\Calificaciones::class));

                // $this->Route = $Route->init();
                $this->Route = $Route;
        }
}
