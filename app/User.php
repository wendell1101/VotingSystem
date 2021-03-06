<?php

namespace App;

use App\Position;
use App\Officer;
use App\Vote;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_no', 'image', 'first_name', 'last_name', 'email', 'password', 'position_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getPosition($id)
    {
        $position = Position::find($id);
        return $position->name;
    }

    //relationships

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function generateStudentNumber()
    {
        $max_id = User::max('id');
        return date("Y") . '-' . str_pad(($max_id + 1), 5, "0", STR_PAD_LEFT) . '-ST-0';
    }

    //check if user is admin
    public function isAdmin()
    {
        return $this->position_id == 1;
    }

    //format date
    public function formatDate($date)
    {
        return $date->format('Y.m.d H:i:s');
    }

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }
}
