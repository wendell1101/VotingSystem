<?php

namespace App;

// use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    // use Sluggable;

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }

    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
