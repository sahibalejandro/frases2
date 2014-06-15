<?php

use Acme\Validators\TagValidator;

/**
 * Class TagsAPIController
 */
class TagsAPIController extends \ResourceAPIController {

    /**
     * @var string
     */
    protected $model = 'Tag';

    /**
     * @param TagValidator $validator
     */
    public function __construct(TagValidator $validator)
    {
        parent::__construct($validator);
    }

} 