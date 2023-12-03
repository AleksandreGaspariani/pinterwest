<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentLike;
use Livewire\Component;

class CommentLivewire extends Component
{

    public $image;
    public $comments;
    public $newComment;
    public function mount($image){
        $this->image = $image;
    }

    public function save(){

        Comment::create([
            'image_id' => $this->image->id,
            'user_id' => auth()->user()->id,
            'comment' => $this->newComment
        ]);
        $this->newComment = '';
        self::render();
    }

    public function likeComment($commentID){
        CommentLike::like($commentID);
        self::render();
    }

    public function render()
    {
        $this->comments = Comment::where('image_id','=',$this->image->id)->orderBy('updated_at','desc')->get();
//        dd($this->comments[6]->likes);
        return view('livewire.comment-livewire');

    }
}
