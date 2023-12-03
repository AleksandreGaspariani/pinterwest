<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WriteComment extends Component
{

    public $imageId;
    public $userId;
    public function mount($userId,$imageId){
        $this->imageId = $imageId;
        $this->userId = $userId;
    }

    public function store(){
        dd($this->userId, $this->imageId);
    }

    public function render()
    {
        return view('livewire.write-comment');
    }
}
