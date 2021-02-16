<?php

namespace App\GenerateCodesSave;

/**
 * Interface GenerateCodesSaveServiceInterface
 * @package App\GenerateCodesSave
 */
interface GenerateCodesSaveServiceInterface
{
    /**
     * @param array $promotionalCodes
     * @param string $filePath
     */
    public function save(array $promotionalCodes, string $filePath): void;
}