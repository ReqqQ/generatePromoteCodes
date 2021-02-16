<?php

namespace App\GenerateCodes;

/**
 * Class GenerateCodesService
 * @package App\GenerateCodes
 */
abstract class GenerateCodesService implements GenerateCodesServiceInterface
{
    private const CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const OFFSET = 0;
    private const START_INDEX = 0;
    protected const COMMAND_NUMBER_OF_CODES = 'numberOfCodes';
    protected const COMMAND_LENGTH_COMBINATION = 'lengthCombination';

    public array $promotionalCodes = [];
    private array $longCommandLineOptions = [
        "numberOfCodes:",
        "lengthCombination:",
        "file:"
    ];
    public string $filePath = '../Storage/generateCodes.txt';
    protected int $numberOfCodes, $lengthCombination;

    abstract public function setRequestData(): void;

    public function generatePromotionalCodes(): void
    {
        for ($i = self::START_INDEX; $i < $this->numberOfCodes; $i++) {
            $code = $this->getUniqueCode();
            $this->promotionalCodes[$code] = $code;
        }
    }

    /**
     * @return string
     */
    private function getUniqueCode(): string
    {
        do {
            $code = $this->generateRandomCode();
        } while ($this->promotionalCodesHasCode($code));

        return $code;
    }

    /**
     * @return string
     */
    private function generateRandomCode(): string
    {
        return substr(str_shuffle(self::CHARACTERS), self::OFFSET, $this->lengthCombination);
    }

    /**
     * @param string $code
     * @return bool
     */
    private function promotionalCodesHasCode(string $code): bool
    {
        return isset($this->promotionalCodes[$code]);
    }

    /**
     * @param string $codeName
     * @return string
     */
    public function getCodeValue(string $codeName): string
    {
        return $_POST[$codeName] ?? getopt(null, $this->longCommandLineOptions)[$codeName];
    }
}