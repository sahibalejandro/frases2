<?php namespace Acme\Validators;

class TagValidator extends InputValidator
{
    protected $rules = [
        'name' => 'required',
    ];
}