<?php

namespace Jorge\Modulos\Web;

use Jorge\Modulos\WebRoute;
use Jorge\Funciones;

trait initDisplay
{

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function initDisplay()
    {
        $Page = $this->getRoute()->getPage();

        if ($Page) {
            $Twig = $Page->getTwig();

            $Twig->setVars([
                'page.title' => Funciones::strFormat("%config_title | %config_var", array(
                    'config_title' => 'Sistema de notas',
                    'config_var' => $Page->getPageTitle()
                ))
            ]);
            header('Content-Type: text/html; charset="utf-8"', true);
            echo $Page->display();
        } else {
            echo "No se encontró el controlador de la pagina especificado";
        }
    }
}
