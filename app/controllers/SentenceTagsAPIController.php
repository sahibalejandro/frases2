<?php

use Acme\Validators\SentenceTagsValidator;
use Acme\Validators\InputValidationException;

class SentenceTagsAPIController extends ResourceAPIController {

    public function __construct(SentenceTagsValidator $validator)
    {
        parent::__construct($validator);
    }

    public function update($id)
    {
        $sentence = Sentence::find($id);

        if (!$sentence) {
            return Response::apiNotFound();
        }

        try {
            $this->validator->validate(Input::all());

            $addTagsIds    = Input::get('add_tags');
            $removeTagsIds = Input::get('remove_tags');

            if ($removeTagsIds != null) {
                $sentence->tags()->detach($removeTagsIds);
            }

            if ($addTagsIds != null) {
                foreach ($addTagsIds as $tagId) {
                    $sentence->tags()->attach($tagId);
                }
            }

            return Response::api(null, 'Sentence tags updated.');
        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e);
        }
    }

} 