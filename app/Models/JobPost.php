<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'jobposts';

    protected $fillable = [
        'user_id',
        'jobtitle',
        'joblocation',
        'jobtype',
        'jobdescription',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}