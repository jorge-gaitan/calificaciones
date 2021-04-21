<?php

namespace Jorge\Modulos\Web;

use Jorge\Modulos\Database\DatabaseConfig;
use Jorge\Modulos\Database;

trait appInit
{
    public function initApp(): void
    {
        DatabaseConfig::init();
        Database::init();
    }
}
