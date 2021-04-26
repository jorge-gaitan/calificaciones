<?php

namespace Jorge\Modulos;

use Jorge\Pages;

final class WebRoute
{

    /**
     *
     * @var Page
     */
    private static $Page;

    /**
     *
     * @var string
     */
    private $PageClass;

    /**
     *
     * @var string
     */
    private $Url;

    /**
     *
     * @var array
     */
    private $Route = [];

    /**
     * 
     * @param string $Url
     * @param string $PageClass
     */
    public function __construct(string $Url = 'p', $PageClass = Pages\Inicio::class)
    {
        $this->Url = $Url;
        $this->PageClass = $PageClass;
    }

    public function addRoute(WebRoute $Route)
    {

        $this->Route[$Route->getUrl()] = $Route;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * 
     * @return string
     */
    public function getPageClass()
    {
        return $this->PageClass;
    }

    /**
     * 
     * @return array
     */
    public function getRoutes()
    {
        return $this->Route;
    }

    /**
     * 
     * @param string $name
     * @return WebRoute
     */
    public function getRoute($name)
    {
        return (array_key_exists($name, $this->getRoutes()) ? $this->getRoutes()[$name] : NULL);
    }

    /**
     * 
     * @return Page
     */
    public static function getPage()
    {
        return self::$Page;
    }

    /**
     * 
     * @param boolean $SubRoute
     * @return \Bulk\Application\Web\WebRoute
     */
    public function init($SubRoute = TRUE)
    {
        $url = filter_input(INPUT_GET, $this->getUrl());
        $Route = $this->getRoutes();

        if ($SubRoute && array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {
            $PageClass = $this->getPageClass();
            self::$Page = new $PageClass();
        }
        return $this;
    }
}
