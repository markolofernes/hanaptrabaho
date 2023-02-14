<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'description',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}