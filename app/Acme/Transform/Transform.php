<?php namespace Acme\Transform;

use Illuminate\Database\Eloquent\Collection;

class Transform {

    /**
     * Transform an entire collection
     *
     * @param Collection $resources
     * @return array
     */
    public static function collection(Collection $resources)
    {
        $transformedResources = [];

        foreach ($resources as $resource) {
            $transformedResources[] = $resource->transform();
        }

        return $transformedResources;
    }

}