<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Commands\CpCommand;

class CommentLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comment_id'
    ];

    public static function like($commentID){
        $userID = auth()->user()->id;
        $like = CommentLike::where('user_id',$userID)->where('comment_id',$commentID)->first();
        if(isset($like)){
            $like->delete();
        }else{
            CommentLike::create([
                'user_id' => auth()->user()->id,
                'comment_id' => $commentID,
            ]);
        }

    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
