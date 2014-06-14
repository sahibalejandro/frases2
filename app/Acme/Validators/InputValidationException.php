<?php namespace Acme\Validators;

use Illuminate\Support\MessageBag;

/**
 * Class InputValidationException
 * @package Acme\Validators
 */
class InputValidationException extends \Exception
{
    /**
     * Validation errors
     *
     * @var MessageBag
     */
    protected $errors;

    /**
     * @param string $message
     * @param MessageBag $errors
     */
    public function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    /**
     * Returns validation errors
     *
     * @return MessageBag
     */
    public function getValidationErrors()
    {
        return $this->errors;
    }
}