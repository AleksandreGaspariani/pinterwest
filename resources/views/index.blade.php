@extends('layouts.app')

@section('content')
    @if(isset($images))
        {{--        <div class="d-flex w-100 container" style="flex-basis: auto; flex-wrap: wrap !important">--}}
        <div class="row justify-content-center" data-masonry='{"percentPosition": true }'>
            @foreach($images as $image)
                {{--            <div class="d-flex flex-column justify-content-start align-items-start px-2 py-2 rounded-3 bg-dark text-white m-1"--}}
                {{--                 @php--}}
                {{--                     $posX = 20;--}}
                {{--                     $posY = 0;--}}
                {{--                 @endphp--}}
                {{--                 style="--}}
                {{--                     border: 1px solid rgba(0,0,0,0.6);--}}
                {{--                 ">--}}
                <div class="col-lg-3 col-md-4 col-sm-5 my-1">
                    <div class="card px-1 py-2 bg-white border-0">
                        <a href="/image/show/{{$image->id}}">
                            <div style="object-fit: cover; overflow: hidden; position: relative">
                                <div style="position: absolute; left: 0;top: 0;background-color: rgba(26,32,44,0.03)"
                                     class="w-100 h-100 rounded-3">

                                </div>
                                <img src="{{ asset("public/image_posts/$image->image") }}" alt=""
                                     {{--                         width="250px"--}}
                                     {{--                         height="300px"--}}
                                     class="rounded-3 w-100" style="object-fit: contain;
                    ">
                            </div>
                        </a>
                        <p class="mb-0">{{$image->description}}</p>
                        {{--                <small class="fw-bolder"><a href="/profile/{{ $image->user->id }}" class="text-dark">{{ $image->user->name }}</a></small>--}}
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <img class="rounded-circle" width="30px"
                                     src="https://randomuser.me/api/portraits/men/80.jpg">
                            </div>
                            <div class="col-md-9">
                                <a class="nav-link text-dark fw-bold" href="/profile/{{ $image->user->id }}">
                                    {{$image->user->name}}
                                </a>
                            </div>

                        </div>
                        {{--                <small style="font-size: 8px">{{ date_format($image->updated_at,'d M Y h:m A') }}</small>--}}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="container">
            <h2>Nothing to show.</h2>
        </div>
    @endif

@endsection
