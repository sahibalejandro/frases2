<?php
/**
 * Created by PhpStorm.
 * User: sahib
 * Date: 14/06/14
 * Time: 18:12
 */

namespace Acme\Validators;


class SentenceTagsValidator extends InputValidator {
    protected $rules = [
        'add_tags'    => 'array|required_without:remove_tags|exists:tags,id',
        'remove_tags' => 'array|required_without:add_tags',
    ];
} 