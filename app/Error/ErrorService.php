<?php

namespace App\Error;

/**
 * Class ErrorService
 * @package App\Error
 */
class ErrorService implements ErrorServiceInterface
{
    /**
     * @return bool
     */
    public static function sessionHasErrorMessage(): bool
    {
        return empty($_SESSION['error_messages']);
    }

    /**
     * @return string
     */
    public static function getSessionErrorMessage(): string
    {
        return $_SESSION['error_messages'];
    }
}