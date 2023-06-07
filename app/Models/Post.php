<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Profile;
use App\Models\User;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        'url'
        ];
        
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);   
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
     public function getPaginateByLimitKey(int $limit_count = 5)
    {
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    
}
