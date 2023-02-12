<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSave extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jobsaves';

    protected $fillable = [
        'jobpost_id',
        'applicant_id',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function jobposts()
    {
        return $this->belongsToMany(JobPost::class);
    }
}