<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'status', 'user_id'];
    public static $blogStatus = ['active', 'inactive'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopeMostLiked(EloquentBuilder|QueryBuilder $query): EloquentBuilder|QueryBuilder
    {
        return $query->withCount('likes')->orderBy('likes_count', 'desc')->take(3);
    }

}
