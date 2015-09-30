<?php

require_once '../app/init.php';
require_once '../app/core/Database.php';
require_once '../app/config/DatabaseConfig.php';

Database::setInstance(
    \DatabaseConfig::DB_INSTANCE,
    \DatabaseConfig::DB_DRIVER,
    \DatabaseConfig::DB_USER,
    \DatabaseConfig::DB_PASS,
    \DatabaseConfig::DB_NAME,
    \DatabaseConfig::DB_HOST
);

$app = new App;

