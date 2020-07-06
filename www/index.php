<?php

require_once 'config/functions.php';

require_once 'controllers/usuarios.controller.php';
require_once 'controllers/restaurantes.controller.php';
require_once 'controllers/template.controller.php';

require_once 'models/usuarios.model.php';
require_once 'models/restaurantes.model.php';


$plantilla = new TemplateController();
$plantilla->templateCtrl();
