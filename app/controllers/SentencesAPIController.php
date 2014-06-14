<?php
use Acme\Validators\InputValidationException;
use Acme\Validators\SentenceValidator;

class SentencesAPIController extends \ResourceAPIController {

    protected $model = 'Sentence';

    public function __construct(SentenceValidator $validator)
    {
        parent::__construct($validator);
    }

    public function index()
    {
        $resources = Sentence::with('tags')->with('author')->get();
        return Response::api(['resources' => $resources]);
    }
    public function store()
    {
        $input = Input::all();

        try {
            $this->validator->validate($input);

            $resource = new Sentence;
            $resource->content = $input['content'];
            $resource->author_id = $input['author_id'];
            $resource->user_id = Auth::user()->id;
            $resource->save();
            $resource->tags()->sync($input['tags']);

            return Response::api(['resource' => $resource]);
        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e->getValidationErrors(), $e->getMessage());
        }
    }
    public function show($id)
    {
        $resource = Sentence::with('tags')->with('author')->find($id);

        if (!$resource) {
            return Response::apiNotFound();
        } else {
            return Response::api(['resource' => $resource]);
        }
    }
}