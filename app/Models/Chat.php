<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'from_user_id','to_user_id', 'name', 'chat'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
    
    public function chats()
    {
        return $this->hasMany(Chat::class, 'from_user_id', 'id');
    }
}
