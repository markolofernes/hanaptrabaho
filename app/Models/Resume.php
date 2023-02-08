<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';

    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'address',
        'email',
        'textarea',
        'skills',
        'language',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

