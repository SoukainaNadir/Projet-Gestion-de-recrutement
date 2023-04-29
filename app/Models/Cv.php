<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'education',
        'experience',
        'skills',
        'interests',
        'image',
        'headline',
        'profil',
        'languages',
        'user_id',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
