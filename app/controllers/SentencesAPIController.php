<?php
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