<?php
use Acme\Transform\Transform;
use Acme\Validators\InputValidationException;
use Acme\Validators\SentenceValidator;

/**
 * Class SentencesAPIController
 */
class SentencesAPIController extends \ResourceAPIController {

    /**
     * @var string
     */
    protected $model = 'Sentence';

    /**
     * @param SentenceValidator $validator
     */
    public function __construct(SentenceValidator $validator)
    {
        parent::__construct($validator);
    }

    /**
     * Show sentences
     *
     * @return mixed
     */
    public function index()
    {
        $resources = Sentence::with('tags')->with('author')->get();
        return Response::api(['resources' => Transform::collection($resources)]);
    }

    /**
     * Store new sentence
     *
     * @return mixed
     */
    public function store()
    {
        try {
            $input = Input::all();
            $this->validator->validate($input);

            $resource = new Sentence;
            $resource->content = $input['content'];
            $resource->author_id = $input['author_id'];
            $resource->user_id = Auth::user()->id;
            $resource->save();
            $resource->tags()->sync($input['tags']);

            return Response::api(['resource' => $resource->transform()]);
        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e);
        }
    }

    /**
     * Update sentence, sync tags is optional.
     *
     * @param int $id
     * @return mixed
     */
    public function update($id)
    {
        $sentence = Sentence::find($id);

        if ( ! $sentence) {
            return Response::apiNotFound();
        }

        try {
            $input = Input::all();
            $this->validator->changeToUpdateRules();
            $this->validator->validate($input, ['tags']);

            $sentence->content   = $input['content'];
            $sentence->author_id = $input['author_id'];
            $sentence->save();

            // Sync tags if needed
            $tagsIds = Input::get('tags');
            if ($tagsIds) {
                Log::debug('Update tags', $tagsIds);
                $sentence->tags()->sync($tagsIds);
            }

            return Response::api(['resource' => $sentence->transform()]);
        } catch (InputValidationException $e) {
            return Response::apiValidationErrors($e);
        }
    }

    /**
     * Show sentence
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        $resource = Sentence::with('tags')->with('author')->find($id);

        if (!$resource) {
            return Response::apiNotFound();
        } else {
            return Response::api(['resource' => $resource->transform()]);
        }
    }
}