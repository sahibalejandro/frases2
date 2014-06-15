<?php

use Acme\Validators\InputValidationException;
use Acme\Validators\SentenceVoteValidator;

class SentenceVoteAPIController extends ResourceAPIController
{

    public function __construct(SentenceVoteValidator $validator)
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

            if ((boolean)Input::get('positive')) {
                $sentence->positive_votes++;
            } else {
                $sentence->negative_votes++;
            }

            $sentence->save();
            return Response::api(['votes' => [
                'positive' => $sentence->positive_votes,
                'negative' => $sentence->negative_votes]
            ], 'Votes updated.');

        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e);
        }
    }
} 