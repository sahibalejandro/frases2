<?php

use Acme\Validators\TagValidator;

class TagsAPIController extends \ResourceAPIController {

    protected $model = 'Tag';

    public function __construct(TagValidator $validator)
    {
        parent::__construct($validator);
    }

} 