<?php
class Sentence extends Eloquent 
{
    protected $table = 'sentences';
    
    public function tags() 
    {
        return $this->belongsToMany('Tag');
    }

    public function author()
    {
        return $this->belongsTo('Author');
    }
}