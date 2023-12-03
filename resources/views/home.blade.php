@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column w-100">
    <div class="ps-3 container w-100">
        <h2>Profile: {{auth()->user()->name}}</h2>
    </div>

    <x-post_image></x-post_image>

    <div>
        <div class="row justify-content-center" data-masonry='{"percentPosition": true }'>

        @foreach($images as $image)
{{--            <div class="d-flex flex-column justify-content-center align-items-center px-2 py-2 rounded-3 bg-dark text-white m-1"--}}
{{--                 style="--}}
{{--                     border: 1px solid rgba(0,0,0,0.6);--}}
{{--                 ">--}}
{{--                <small>Author <a href="/profile/{{ $image->user->name }}" class="text-info">{{ $image->user->name }}</a></small>--}}
{{--                    <img src="{{ asset("public/image_posts/$image->image") }}" alt=""--}}
{{--                         width="230px"--}}
{{--                         height="300px"--}}
{{--                         class="rounded-3" style="object-fit: cover;--}}
{{--                 ">--}}
{{--                <p>{{$image->description}}</p>--}}
{{--                <small style="font-size: 8px">{{ date_format($image->updated_at,'d M Y h:m A') }}</small>--}}
{{--                <div class="d-flex w-100 btn-group mt-2">--}}
{{--                    <a href="{{ route('edit_image',$image->id) }}" class="btn btn-outline-info">Edit</a>--}}
{{--                    <a href="{{ route('destroy_image',$image->id) }}" class="btn btn-outline-danger">Delete</a>--}}
{{--                </div>--}}
{{--            </div>--}}

                <div class="col-lg-3 col-md-4 col-sm-5 my-1">
                    <div class="card px-1 py-2 bg-white border-0">
                        <a href="/image/show/{{$image->id}}">
                            <div style="object-fit: cover; overflow: hidden; position: relative">
                                <div style="position: absolute; left: 0;top: 0;background-color: rgba(26,32,44,0.03)"
                                     class="w-100 h-100 rounded-3">
                                </div>
                                <img src="{{ asset("public/image_posts/$image->image") }}" alt=""
                                     class="rounded-3 w-100" style="object-fit: contain;
                    ">
                            </div>
                        </a>
                        <p class="mb-0">{{$image->description}}</p>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <img class="rounded-circle" width="30px"
                                     src="https://randomuser.me/api/portraits/men/80.jpg"> <!-- profile photo path -->
                            </div>
                            <div class="col-md-9">
                                <a class="nav-link text-dark fw-bold" href="/profile/{{ $image->user->id }}">
                                    {{$image->user->name}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
