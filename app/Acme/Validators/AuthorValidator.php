<?php namespace Acme\Validators;


/**
 * Class AuthorValidator
 * @package Acme\Validators
 */
class AuthorValidator extends InputValidator
{
    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required',
    ];
} 