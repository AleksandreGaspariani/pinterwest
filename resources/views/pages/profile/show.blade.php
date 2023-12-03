@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column w-100">
        <div class="w-100">
            <h2>Profile: {{ $profile->name }}</h2>
        </div>

        <div>
            <div class="d-flex w-100 container" style="flex-basis: auto; flex-wrap: wrap !important">
                @foreach($profile->image as $image)
                    <div class="d-flex flex-column justify-content-start align-items-start px-2 py-2 rounded-3 bg-dark text-white m-1"
                         @php
                             $posX = 20;
                             $posY = 0;
                         @endphp
                         style="
                     border: 1px solid rgba(0,0,0,0.6);
                 ">
                        <small>Author <span class="text-light">{{ $image->user->name }}</span></small>
                        <p href="/image/show/{{$image->id}}" class="position-relative">
                            <img src="{{ asset("public/image_posts/$image->image") }}" alt=""
                                 width="250px"
                                 height="300px"
                                 class="rounded-3" style="object-fit: cover;
                 ">
                        </p>
                        <p>{{$image->description}}</p>
                        <small style="font-size: 8px">{{ date_format($image->created_at,'d M Y h:m A') }}</small>
{{--                        <div class="d-flex w-100 btn-group mt-2">--}}
{{--                            <a href="" class="btn btn-outline-info">Edit</a>--}}
{{--                            <a href="" class="btn btn-outline-danger">Delete</a>--}}
{{--                        </div>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
