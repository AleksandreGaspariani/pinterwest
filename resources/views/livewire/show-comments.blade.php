<div style="overflow-y: scroll">
    @if(sizeof($comments) > 0)
        <ul class="comments list-group">
            @foreach($comments as $comment)
                <li class="list-group-item d-flex flex-column justify-content-start w-100">
                    <div class="w-100 d-flex justify-content-between">
                        <span class="text-info">{{$comment->user->name}}</span>
                        <span class="text-end btn p-0 m-0">
                            <small style="font-size: 9px">
                                {{date_format($comment->updated_at,'Y M d H:i:s')}}
                            </small>
                            👍{{$comment->like_count}}
                        </span>
                    </div>
                    <div class="w-100 text-end d-flex">

                        <p class="text-start w-100 px-1 py-3">{{$comment->comment}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div>
{{--    @dd($comments->image())--}}
    <livewire:write-comment imageId="{{$comments[0]['image_id']}}" :userId="auth()->user()->id"/>
</div>
