<?php namespace Acme\Validators;


class SentenceValidator extends InputValidator {
    protected $rules = [
        'content'   => 'required',
        'author_id' => 'required|exists:authors,id',
        'tags'      => 'required|exists:tags,id',
    ];
} 