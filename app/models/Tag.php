<?php

/**
 * Class Tag
 */
class Tag extends APIModel
{
    /**
     * @var string
     */
    protected $table = 'tags';
    /**
     * @var array
     */
    protected $fillable = ['name'];
    /**
     * @var array
     */
    protected $hidden = ['pivot'];

    /**
     * @return mixed
     */
    public function sentences()
    {
        return $this->belongsToMany('Sentence');
    }

    /**
     * @return array
     */
    public function transform()
    {
        return [
            'id' => (integer) $this->id,
            'name' => $this->name
        ];
    }
}