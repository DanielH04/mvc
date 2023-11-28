<?php

require_once __DIR__.'/vendor/autoload.php';
require_once 'controllers/usuarios.controller.php';
require_once 'models/usuarios.model.php';
//require_once 'service_worker.js';


use Controllers\AppController;

AppController::startApp();

?>