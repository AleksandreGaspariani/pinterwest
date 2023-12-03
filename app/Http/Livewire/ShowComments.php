<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ShowComments extends Component
{
    public $imageId;
    public $comments;

    public function store(){

    }

    public function mount($postId){
        $this->imageId = $postId;
    }

    public function render()
    {
        $this->comments = Comment::where('image_id','=',$this->imageId)->orderBy('updated_at','desc')->get();
        return view('livewire.show-comments');

    }
}
