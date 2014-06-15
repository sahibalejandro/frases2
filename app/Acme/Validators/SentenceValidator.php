<?php namespace Acme\Validators;


/**
 * Class SentenceValidator
 * @package Acme\Validators
 */
class SentenceValidator extends InputValidator {
    /**
     * @var array
     */
    protected $rules = [
        'content'   => 'required',
        'author_id' => 'required|exists:authors,id',
        'tags'      => 'required|array|exists:tags,id',
    ];

    /**
     * Modify rules for "update" mode.
     */
    public function changeToUpdateRules()
    {
        $this->rules['tags'] = 'array|exists:tags,id';
    }
} 