<?php

namespace App\Validation;

use App\GenerateCodes\GenerateCodesService;
use Exception;
use RuntimeException;

session_start();

class ValidationGenerateCodes implements ValidationInterface
{
    private const CLI = 'cli';
    private const REDIRECT_PATH = "Location: ../index.php";
    private const POST_METHOD = "POST";
    private const EMPTY_REQUEST_DATA = 'Empty request data';
    private const NUMBER_OF_CODES = 'numberOfCodes';
    private const LENGTH_COMBINATION = 'lengthCombination';
    private const LENGTH_COMBINATION_MINIMUM_VALUE = 4;
    private const VALIDATE_ERROR_MESSAGES = [
        self::POST_METHOD => 'Wrong request method.Try again',
        self::EMPTY_REQUEST_DATA => 'Empty data.Try again',
        self::LENGTH_COMBINATION => 'Length Combination is lower than 4.Write number greater than 4.Try again'

    ];
    private GenerateCodesService $generateCodesService;

    public function validate(): void
    {
        if ($this->isConsoleScript()) {
            $this->hasMinimumValue();

            return;
        }

        $this->validateRequestData();
    }

    /**
     * @return bool
     */
    public function isConsoleScript(): bool
    {
        return PHP_SAPI === self::CLI;
    }

    private function hasMinimumValue(): void
    {
        $lengthCombination = $this->generateCodesService->getCodeValue(self::LENGTH_COMBINATION);
        if ($lengthCombination < self::LENGTH_COMBINATION_MINIMUM_VALUE) {
            exit(self::VALIDATE_ERROR_MESSAGES[self::LENGTH_COMBINATION]);
        }
    }

    private function validateRequestData(): void
    {
        try {
            $this->isPostMethod();
            $this->requestHasData();
        } catch (Exception $exception) {
            $_SESSION['error_messages'] = 'Error: ' . $exception->getMessage();
            header(self::REDIRECT_PATH);
            exit();
        }
    }

    /**
     * @return bool
     */
    private function isPostMethod(): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== self::POST_METHOD) {
            throw new RuntimeException(self::VALIDATE_ERROR_MESSAGES[self::POST_METHOD]);
        }

        return true;
    }

    /**
     * @return bool
     */
    private function requestHasData(): bool
    {
        if (empty($_POST[self::NUMBER_OF_CODES]) || empty($_POST[self::LENGTH_COMBINATION])) {
            throw new RuntimeException(self::VALIDATE_ERROR_MESSAGES[self::EMPTY_REQUEST_DATA]);
        }

        return true;
    }

    /**
     * @param GenerateCodesService $generateCodesService
     */
    public function setGenerateCodesService(GenerateCodesService $generateCodesService): void
    {
        $this->generateCodesService = $generateCodesService;
    }
}