<?php

require_once(dirname(__DIR__, 2) . '/vendor/autoload.php');

use App\GenerateCodes\FormGenerateCodesService;
use App\GenerateCodes\GenerateCodes;
use App\GenerateCodesSave\GenerateCodesSaveService;
use App\Validation\ValidationGenerateCodes;

$generateCodes = new GenerateCodes(
    new ValidationGenerateCodes(),
    new GenerateCodesSaveService(),
    new FormGenerateCodesService()
);
$generateCodes->generateCodes();