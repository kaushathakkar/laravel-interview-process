<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    protected $fillable = [
        'candidate_id',
        'user_id',
        'opening_id',
        'interview_round',
        'status',
        'notes'  
    ];
    public function candidates()
    {
        return $this->belongsTo(Candidate::class);
    }
}
