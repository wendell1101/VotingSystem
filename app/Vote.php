<?php

namespace App;

use App\Officer;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'candidate_id', 'officer_id', 'user_id'
    ];

    public function getVotesByOfficer($officer_id)
    {
        $vote = $this::where('officer_id', '=', $officer_id)->get();
        if (is_null($vote)) {
            return 0;
        }
        return $vote->count();
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
