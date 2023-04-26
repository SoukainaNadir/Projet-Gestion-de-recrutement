<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable =
    ['title','description','slug','location','salary','jobetype','image','user_id','start_date','expired_date'];
    public function getRouteKeyName(){
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
