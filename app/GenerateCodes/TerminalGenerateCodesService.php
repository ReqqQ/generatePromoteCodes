<?php

namespace App\GenerateCodes;

/**
 * Class TerminalGenerateCodesService
 * @package App\GenerateCodes
 */
class TerminalGenerateCodesService extends GenerateCodesService
{
    private const COMMAND_FILE_PATH = 'file';

    public function setRequestData(): void
    {
        $this->numberOfCodes = $this->getCodeValue(self::COMMAND_NUMBER_OF_CODES);
        $this->lengthCombination = $this->getCodeValue(self::COMMAND_LENGTH_COMBINATION);
        $this->filePath = $this->getCodeValue(self::COMMAND_FILE_PATH);
    }
}