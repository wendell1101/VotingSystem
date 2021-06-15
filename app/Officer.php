<?php

namespace App;

use App\Vote;
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
        'name'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function checkIfUserHasVoted($user_id, $officer_id)
    {
        $vote = Vote::where([
            ['user_id', '=', $user_id],
            ['officer_id', '=', $officer_id],
        ])->first();
        if ($vote === null) {
            return false;
        }
        return true;
    }

    public function getVotesByOfficer($officer_id)
    {
        $vote = Vote::where('officer_id', '=', $officer_id)->get();
        if (is_null($vote)) {
            return 0;
        }
        return $vote->count();
    }

    public function getTotalVotesPerOfficer($officer_id)
    {
        // select * from votes where candidate_id = candidate_id And officer_id = officer_id
        $vote = Vote::where([
            ['officer_id', '=', $officer_id],
        ])->get();
        if (is_null($vote)) {
            return 0;
        }
        return $vote->count();
    }
}
