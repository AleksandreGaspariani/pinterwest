<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'image',
        'user_id'
    ];

    protected $with = [
//        'comment',
//        'user',
    ];

    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function comment(): HasMany
    {
        return $this->HasMany(Comment::class);
    }
}
