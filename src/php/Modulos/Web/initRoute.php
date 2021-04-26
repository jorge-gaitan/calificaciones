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
                        ->addRoute(new WebRoute('jorge', Pages\Jorge::class));

                $this->Route = $Route->init();
                $this->Route = $Route;
        }
}
