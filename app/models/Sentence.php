<?php
class Sentence extends Eloquent 
{
    protected $table = 'sentences';
    protected $hidden = ['user_id', 'author_id'];
    
    public function tags() 
    {
        return $this->belongsToMany('Tag');
    }

    public function author()
    {
        return $this->belongsTo('Author');
    }
}