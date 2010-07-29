<?php

require_once __DIR__.'/../frontend/FrontendKernel.php';

$kernel = new FrontendKernel('prod', false);
$kernel->handle()->send();
