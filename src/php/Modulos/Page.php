<?php

namespace Jorge\Modulos;

use Jorge\Modulos\Twig;

abstract class Page
{

    /**
     *
     * @var string 
     */
    private $Page_Title;

    /**
     *
     * @var string 
     */
    private $Page_Template;

    /**
     *
     * @var Twig 
     */
    private $Twig;

    /**
     *
     * @var bool
     */
    private $Admin = false;

    /**
     * 
     * @param string $Page_Title
     * @param string $Page_Template
     * @param Twig $Twig_Class
     */
    public function __construct($Page_Title = NULL, $Page_Template = NULL, Twig $Twig_Class = NULL)
    {

        $this->Page_Title = ($Page_Title) ?: "Por defecto";
        $this->Page_Template = ($Page_Template) ?: "base.twig";

        $this->Twig = ($Twig_Class) ?: new Twig();

        $this->preparePage();
    }

    public abstract function setUp();

    public abstract function CheckPost();

    public abstract function initVars();

    public function preparePage()
    {
        $this->setFilters();
        $this->setTemplate($this->getPageTemplate());

        $this->setUp();
        if ($this->getPost()) {
            $this->CheckPost();
        }
        $this->initVars();
    }

    private function setFilters()
    {
        $Twig = $this->getTwig();
    }

    /**
     * 
     * @param array $vars
     */
    public function setVars(array $vars)
    {
        $this->getTwig()->setVars($vars);
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function setVar(string $name, $value)
    {
        $this->getTwig()->setVar($name, $value);
    }

    /**
     * 
     * @param string $template
     */
    public function setTemplate(string $template)
    {
        $this->getTwig()->setTemplate($template);
    }

    /**
     * 
     * @return string
     */
    public function display()
    {
        return $this->getTwig()->getRender();
    }

    /**
     * 
     * @return Twig
     */
    public function getTwig()
    {
        return $this->Twig;
    }

    /**
     * 
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->Admin;
    }

    /**
     * 
     * @param bool $admin
     * @return $this
     */
    public function setAdmin(bool $admin)
    {
        $this->Admin = $admin;
        return $this;
    }


    /**
     * 
     * @param string $var
     * @param int $filter_type
     * @return string
     */
    public function getPost(string $var = NULL, int $filter_type = FILTER_SANITIZE_STRING)
    {
        if (!$var) {
            $POST = filter_input_array(INPUT_POST);
            return ($POST ?: []);
        } else {
            return filter_input(INPUT_POST, $var, $filter_type);
        }
    }

    /**
     * FILTER_VALIDATE_INT
     * @param string $var
     * @return int|null
     */
    public function getPostInt(string $var)
    {
        return $this->getPost($var, FILTER_VALIDATE_INT);
    }

    /**
     * 
     * @param string $var
     * @param int $filter_type
     * @return array|string
     */
    public function getGet(string $var = NULL, int $filter_type = FILTER_SANITIZE_STRING)
    {
        if (!$var) {
            $GET = filter_input_array(INPUT_GET);
            return ($GET ?: []);
        } else {
            return filter_input(INPUT_GET, $var, $filter_type);
        }
    }

    /**
     * 
     * @return string
     */
    public function getPageTitle()
    {
        return $this->Page_Title;
    }

    /**
     * 
     * @return string
     */
    public function getPageTemplate()
    {
        return $this->Page_Template;
    }

    /**
     * 
     * @param string $Page_title
     */
    public function setPageTitle($Page_title)
    {
        $this->Page_Title = $Page_title;
    }

    /**
     * 
     * @param string $Page_template
     */
    public function setPageTemplate($Page_template)
    {
        $this->Page_Template = $Page_template;
    }
}
