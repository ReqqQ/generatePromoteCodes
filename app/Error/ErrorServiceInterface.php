<?php

namespace App\Error;

/**
 * Interface ErrorServiceInterface
 * @package App\Error
 */
interface ErrorServiceInterface
{
    /**
     * @return bool
     */
    public static function sessionHasErrorMessage(): bool;

    /**
     * @return string
     */
    public static function getSessionErrorMessage(): string;
}