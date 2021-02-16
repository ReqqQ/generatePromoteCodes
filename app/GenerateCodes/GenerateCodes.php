<?php

namespace App\GenerateCodes;

use App\GenerateCodesSave\GenerateCodesSaveService;
use App\Validation\ValidationGenerateCodes;

/**
 * Class GenerateCodes
 * @package App\GenerateCodes
 */
class GenerateCodes implements GenerateCodesInterface
{
    private const REDIRECT_PATH = "Location: ../View/save.html";
    private ValidationGenerateCodes $validation;
    private GenerateCodesService $generateCodesService;
    private GenerateCodesSaveService $generateCodesSaveService;

    public function __construct(
        ValidationGenerateCodes $validation,
        GenerateCodesSaveService $generateCodesSaveService,
        GenerateCodesService $generateCodesService
    ) {
        $this->validation = $validation;
        $this->generateCodesService = $generateCodesService;
        $this->generateCodesSaveService = $generateCodesSaveService;
    }

    public function generateCodes(): void
    {
        if ($this->validation->isConsoleScript()) {
            $this->generateCodesService = new TerminalGenerateCodesService;
        }

        $this->validation->setGenerateCodesService($this->generateCodesService);
        $this->validation->validate();

        $this->generateCodesService->setRequestData();
        $this->generateCodesService->generatePromotionalCodes();

        $this->generateCodesSaveService->save(
            $this->generateCodesService->promotionalCodes,
            $this->generateCodesService->filePath
        );

        header(self::REDIRECT_PATH);
    }
}