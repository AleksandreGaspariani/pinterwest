<div class="d-flex flex-column justify-content-between" style="min-height: 80vh;max-height: 80vh;">

    <div style="min-height: 75vh;max-height: 75vh; overflow-y: scroll">
        {{--    @dd($comments)--}}
        @if(sizeof($comments) > 0)
            <ul class="comments list-group">
                @foreach($comments as $comment)
                    <li class="list-group-item d-flex flex-column justify-content-start w-100">
                        <div class="w-100 d-flex justify-content-between">
                            <span class="text-info">{{$comment->user->name}}</span>
                            <button wire:click="likeComment({{$comment->id}})" class="text-end btn p-0 m-0" >
                            <small style="font-size: 9px">
                                {{date_format($comment->updated_at,'Y M d H:i:s')}}
                            </small>
                            👍{{$comment->likes}}
                        </button>
                        </div>
                        <div class="w-100 text-end d-flex">

                            <p class="text-start w-100 px-1 py-3">{{$comment->comment}}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
    <div class="d-flex align-self-end" style="min-height: 5vh; max-height: 5vh;">
        <form wire:submit.prevent="save">
            <input type="text" wire:model="newComment">
            <button type="submit">Post</button>
        </form>
        {{--    @dd($comments->image())--}}
        {{--    <livewire:write-comment imageId="{{$comments[0]['image_id']}}" :userId="auth()->user()->id"/>--}}
    </div>
</div>

