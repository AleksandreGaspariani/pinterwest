<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'image_id',
        'user_id',
        'comment'
    ];
    protected $appends = [
        'likes',
    ];

//    protected $with = [
//        'image',
//        'user'
//    ];





    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentLike(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }


    public function getLikesAttribute(){
        return count($this->commentLike);
    }

}
