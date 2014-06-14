<?php

class Tag extends Eloquent
{
    protected $table = 'tags';
    protected $fillable = ['name'];
    
    public function sentences()
    {
        return $this->belongsToMany('Sentence');
    }
}