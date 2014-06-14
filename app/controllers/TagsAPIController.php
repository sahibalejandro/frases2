<?php

use Acme\Validators\TagValidator;
use Acme\Validators\InputValidationException;

/**
 * Class TagsAPIController
 */
class TagsAPIController extends \BaseController {

    /**
     * Validator to validate input data
     *
     * @var Acme\Validators\TagValidator
     */
    protected $validator;

    /**
     * @param TagValidator $validator
     */
    public function __construct(TagValidator $validator)
	{
		$this->validator = $validator;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $tags = Tag::all();
		return Response::api($tags);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		try {
			$this->validator->validate($input);
			return Response::api(Tag::create($input));
		} catch (InputValidationException $e) {
			return Response::api($e->getValidationErrors(), $e->getMessage(), false);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $tag = Tag::find($id);

        if (!$tag) {
            return Response::api(null, 'Tag not found', false);
        } else {
		    return Response::api($tag);
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $tag = Tag::find($id);

        if (!$tag) {
            return Response::api(null, 'Tag not found', false);
        }

        $input = Input::all();

        try {
            $this->validator->validate($input);
            $tag->update($input);
            return Response::api($tag);
        } catch (InputValidationException $e) {
            return Response::api($e->getValidationErrors(), $e->getMessage(), false);
        }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tag::destroy($id);
		return Response::api(null, 'Record deleted');
	}


}
