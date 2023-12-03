@extends('layouts.app')

@section('content')
    <div class="d-flex container justify-content-end align-items-end">
        <a href="{{ redirect()->back() }}" class="nav-link">
            🪃 Back
        </a>
    </div>
    <div class="container d-flex justify-content-evenly align-items-start">
        <div class="d-flex flex-column justify-content-start align-items-start px-2 py-2 rounded-3 bg-dark text-white m-1"
             @php
                 $posX = 20;
                 $posY = 0;
             @endphp
             style="
                     border: 1px solid rgba(0,0,0,0.6);
                 ">
            <small>Author <a href="/profile/{{ $image->user->name }}" class="text-info">{{ $image->user->name }}</a></small>
            <a href="/image/show/{{$image->id}}" class="position-relative">
                <img src="{{ asset("public/image_posts/$image->image") }}" alt=""
                     width="400px"
                     class="rounded-3" style="object-fit: contain;
                 ">
            </a>
            <p>{{$image->description}}</p>
            <small style="font-size: 8px">{{ date_format($image->created_at,'d M Y h:m A') }}</small>
        </div>
        <div class="bg-dark rounded-2 p-2 w-75 d-flex justify-content-between flex-column" >
{{--            <livewire:show-comments :postId="$image->id"/>--}}
            <livewire:comment-livewire :image='$image'/>

        </div>
    </div>
@endsection
