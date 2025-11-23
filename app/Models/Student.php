<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture', 
        'father_name',
        'mother_name',
    ];

    /**
     * The attributes that should be hidden for arrays/JSON.
     */
    protected $hidden = [
        'password',
    ];
}
