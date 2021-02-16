<?php

namespace App\GenerateCodesSave;

/**
 * Class GenerateCodesSaveService
 * @package App\GenerateCodesSave
 */
class GenerateCodesSaveService implements GenerateCodesSaveServiceInterface
{
    /**
     * @param array $promotionalCodes
     * @param string $filePath
     */
    public function save(array $promotionalCodes, string $filePath): void
    {
        file_put_contents($filePath, implode(PHP_EOL, $promotionalCodes));
    }
}