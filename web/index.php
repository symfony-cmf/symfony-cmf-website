<?php

require_once __DIR__.'/../frontend/FrontendKernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new FrontendKernel('prod', false);
$kernel->handle(new Request())->send();
