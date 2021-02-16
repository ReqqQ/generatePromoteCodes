<?php

namespace App\GenerateCodes;

/**
 * Class FormGenerateCodesService
 * @package App\GenerateCodes
 */
class FormGenerateCodesService extends GenerateCodesService
{
    public function setRequestData(): void
    {
        $this->numberOfCodes = $this->getCodeValue(self::COMMAND_NUMBER_OF_CODES);
        $this->lengthCombination = $this->getCodeValue(self::COMMAND_LENGTH_COMBINATION);
    }
}