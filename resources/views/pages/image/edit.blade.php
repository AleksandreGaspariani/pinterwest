@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="d-flex w-100 justify-content-center align-items-center">
            <div class="d-flex justify-content-start">
                <p>Notification: </p>
                <ul>
                    <li class="text-success">{{session('message')}}</li>
                </ul>
            </div>
        </div>
   ) @endif
    <form action="/image/update/{{$image->id}}">
        @csrf
        @method('POST')
        <div class="d-flex w-100 justify-content-center align-items-start container" style="flex-basis: auto; flex-wrap: wrap !important">
            <div class="d-flex flex-column justify-content-center align-items-center px-2 py-2 rounded-3 bg-dark text-white m-1 position-relative"
                 style="
                 border: 1px solid rgba(0,0,0,0.6);
                ">
                <small>Author:
                    <span class="text-info">{{ $image->user->name }}</span>
                </small>
                <img src="{{ asset("public/image_posts/$image->image") }}" alt=""
                     width="230px"
                     height="300px"
                     class="rounded-3" style="object-fit: cover;
                ">
                <textarea name="description" class="rounded-2 px-2 py-1 bg-dark text-white w-100 mt-1">{{$image->description}}</textarea>
                <small class="position-absolute" style="font-size: 8px;bottom: 3px; left: 2px">{{ date_format($image->updated_at,'d M Y h:m A') }}</small>
                <div class="d-flex w-100 btn-group mt-2">
                    <input type="submit" class="btn btn-outline-light mb-2">
                </div>
            </div>
        </div>
    </form>

@endsection
