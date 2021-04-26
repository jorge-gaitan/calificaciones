<?php

namespace Jorge\Pages;

use Jorge\Modulos\Page;

final class Jorge extends Page
{
    public function __construct()
    {
        parent::__construct("Pagina de Jorge", "jorge.twig");
    }

    public function setUp()
    {
    }

    public function initVars()
    {
    }

    public function CheckPost()
    {
    }
}
