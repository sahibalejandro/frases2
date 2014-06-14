<?php
class Author extends Eloquent 
{
    protected $table = 'authors';
    
    public function  sentences()
    {
        return $this->hasMany('Sentence');
    }
}