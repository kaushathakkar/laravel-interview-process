<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    protected $fillable = [
        'job_title',
        'status' 
    ];
    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
