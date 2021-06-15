<?php

namespace App;

use App\Partylist;
use App\Vote;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'image', 'name', 'course_and_section', 'email', 'contact_no', 'description', 'platform', 'officer_id', 'partylist_id'
    ];

    public function officers()
    {
        return $this->belongsTo(Officer::class);
    }

    public function getOfficerName($id)
    {
        $officer = Officer::findOrFail($id);
        if (!$officer) {
            return null;
        }
        return $officer->name;
    }
    public function getPartylistName($id)
    {
        $partylist = Partylist::findOrFail($id);
        if (!$partylist) {
            return null;
        }
        return $partylist->name;
    }

    public function formatNumber($number)
    {
        return number_format((float)$number, 0, '.', '');
    }
    public function getCandidateVotesCount($officer_id, $candidate_id)
    {
        // select * from votes where candidate_id = candidate_id And officer_id = officer_id
        $vote = Vote::where([
            ['officer_id', '=', $officer_id],
            ['candidate_id', '=', $candidate_id],
        ])->get();
        if (is_null($vote)) {
            return 0;
        }
        return $vote->count();
    }

    public function getVotePercentagePerCandidate($candidate_vote_count, $officer_total_vote_count)
    {
        $percentage =  $candidate_vote_count == 0 ? 0 : $candidate_vote_count / $officer_total_vote_count * 100;
        return $this->formatNumber($percentage);
    }

    public function partylists()
    {
        return $this->belongsTo(Partylist::class);
    }
}
