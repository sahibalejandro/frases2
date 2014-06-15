<?php

abstract class APIModel extends \Eloquent {

    /**
     * Transform the object for API results
     *
     * @return array
     */
    public function transform()
    {
        return $this;
    }
} 