<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coverletter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'headline',
        'email',
        'phone',
        'address',
        'object',
        'content',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
