<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image_url',
        'fav_band',
        'fav_song',
        'user_id',
    ];
    
     public function user()
    {
        return $this->hasone(User::class);
    }
}
