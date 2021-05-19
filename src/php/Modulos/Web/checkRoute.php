<?php

namespace Jorge\Modulos\Web;

use Jorge\Modulos\Web;
use Jorge\Pages;

trait checkRoute
{

    /**
     * 
     * @return WebRoute
     */
    public abstract function getRoute();

    private function checkRoute()
    {
        $Route = $this->getRoute();
        $UserSession = Web::$loged;

        $Url = filter_input(INPUT_GET, 'p');
        $Whitelist = [
            'login',
            'registro'
        ];

        if (in_array($Url, $Whitelist)) {
            $Route->init();
        } else if (!$UserSession) {
            $Route
                ->getRoute('login')
                ->init(FALSE);
        } else {
            $Route->init();
        }

        $Page = $Route->getPage();
        $Twig = $Page->getTwig();
        $Twig->setVar('user.data', $UserSession);
    }
}
