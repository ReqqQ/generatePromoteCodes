<?php

namespace App\GenerateCodes;

/**
 * Interface GenerateCodesServiceInterface
 * @package App\GenerateCodes
 */
interface GenerateCodesServiceInterface
{
    public function setRequestData(): void;

    public function generatePromotionalCodes(): void;

    public function getCodeValue(string $codeName): string;
}