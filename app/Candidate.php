<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'job_profile',
        'city',
        'contact',
        'qualification',
        'is_fresher',
        'total_experience',
        'skills',
        'expected_ctc'              
    ];
    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
    public function followups()
    {
        return $this->hasMany(Followup::class);
    }
}
