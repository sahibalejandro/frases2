<?php
use Acme\Transform\Transform;

/**
 * Class Sentence
 */
class Sentence extends APIModel
{
    /**
     * @var string
     */
    protected $table = 'sentences';

    /**
     * @return mixed
     */
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    /**
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo('Author');
    }

    /**
     * @return array
     */
    public function transform()
    {
        // Transform tags
        $tags = Transform::collection($this->tags);

        // Transform sentence
        return [
            'id'             => (integer) $this->id,
            'content'        => $this->content,
            'positive_votes' => (integer) $this->positive_votes,
            'negative_votes' => (integer) $this->negative_votes,
            'created_at'     => (string) $this->created_at,
            'updated_at'     => (string) $this->updated_at,
            'author'         => $this->author->transform(),
            'tags'           => $tags,
        ];
    }
}