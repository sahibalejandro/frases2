<?php

use Acme\Validators\InputValidator;
use Acme\Validators\InputValidationException;
use Acme\Transform\Transform;

/**
 * Class ResourceAPIController
 */
abstract class ResourceAPIController extends \BaseController {

    /**
     * Validator to validate input data
     *
     * @var Acme\Validators\Validator
     */
    protected $validator;

    /**
     * @var string
     */
    protected $model;


    /**
     * @param InputValidator $validator
     */
    public function __construct(InputValidator $validator)
	{
        $this->validator = $validator;
        $filteredActions = ['only' => ['store', 'update', 'destroy']];
        $this->beforeFilter('auth.basic.once', $filteredActions);
        $this->beforeFilter('user.active', $filteredActions);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $model = $this->model;
        $resources = $model::all();
		return Response::api(['resources' => Transform::collection($resources)]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $model = $this->model;

        try {
            $input = Input::all();
            $this->validator->validate($input);
            $resource = $model::create($input);
			return Response::api(['resource' => $resource->transform()]);
		} catch (InputValidationException $e) {
			return Response::apiValidationErrors($e);
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
        $model = $this->model;
        $resource = $model::find($id);

        if (!$resource) {
            return Response::apiNotFound();
        } else {
		    return Response::api(['resource' => $resource->transform()]);
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
        $model = $this->model;
        $resource = $model::find($id);

        if (!$resource) {
            return Response::apiNotFound();
        }

        try {
            $input = Input::all();
            $this->validator->validate($input);
            $resource->update($input);
            return Response::api(['resource' => $resource->transform()]);
        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e);
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
        $model = $this->model;
		$resource = $model::find($id);

        if (!$resource) {
            return Response::apiNotFound();
        } else {
            $resource->delete();
            return Response::apiDeleted();
        }
	}
}
