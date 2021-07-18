<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'candidate_id',
        'user_id',
        'opening_id',
        'interview_time',
        'status',
        'comments'  
    ];
    
    public function candidates()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function openings()
    {
        return $this->belongsTo(Opening::class);
    }
}
