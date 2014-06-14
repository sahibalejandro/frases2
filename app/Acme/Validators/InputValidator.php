<?php namespace Acme\Validators;

use Illuminate\Validation\Factory as Validator;

/**
 * Class InputValidator
 * @package Acme\Validators
 */
abstract class InputValidator extends Validator
{
    /**
     * @var array
     */
    protected $rules;
    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;
    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validation;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Perform the input validation
     *
     * @param array $input
     * @return bool
     * @throws InputValidationException
     */
    public function validate(array $input)
    {
        $this->validation = $this->validator->make($input, $this->getValidationRules());

        if ($this->validation->fails()) {
            throw new InputValidationException('Validation fails.', $this->getValidationErrors());
        }

        return true;
    }

    /**
     * Returns validation rules
     *
     * @return array
     */
    protected function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * Returns validation error messages
     *
     * @return \Illuminate\Support\MessageBag
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }
}