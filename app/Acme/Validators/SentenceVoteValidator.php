<?php namespace Acme\Validators;


class SentenceVoteValidator extends InputValidator {
    protected $rules = [
        'positive' => 'required|boolean',
    ];
} 