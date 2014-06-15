<?php

use Acme\Validators\AuthorValidator;

/**
 * Class AuthorsAPIController
 */
class AuthorsAPIController extends ResourceAPIController
{
    /**
     * @var string
     */
    protected $model = 'Author';

    public function __construct(AuthorValidator $validator)
    {
        parent::__construct($validator);
    }
} 