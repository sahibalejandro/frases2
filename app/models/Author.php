<?php

/**
 * Class Author
 */
class Author extends \APIModel
{
    /**
     * @var string
     */
    protected $table = 'authors';
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return mixed
     */
    public function  sentences()
    {
        return $this->hasMany('Sentence');
    }

    /**
     * @return array
     */
    public function transform()
    {
        return [
            'id' => (integer) $this->id,
            'name' => $this->name,
        ];
    }
}