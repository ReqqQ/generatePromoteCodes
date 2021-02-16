<?php

namespace App\Validation;

use App\GenerateCodes\GenerateCodesService;

/**
 * Interface ValidationInterface
 * @package App\Validation
 */
interface ValidationInterface
{
    public function validate(): void;

    public function isConsoleScript(): bool;

    public function setGenerateCodesService(GenerateCodesService $generateCodesService): void;
}