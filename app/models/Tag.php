<?php

class Tag extends Eloquent
{
    protected $table = 'tags';
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];
    
    public function sentences()
    {
        return $this->belongsToMany('Sentence');
    }
}