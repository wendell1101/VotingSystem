<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partylist extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
