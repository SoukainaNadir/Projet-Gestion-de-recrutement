<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyForJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'title',
        'CoverLetterfile',
        'CVfile',
        'ExCv',
        'ExCl',
    ];
}
