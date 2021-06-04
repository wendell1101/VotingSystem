<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'image', 'name', 'course_and_section', 'email', 'contact_no', 'description', 'platform', 'officer_id'
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
}
