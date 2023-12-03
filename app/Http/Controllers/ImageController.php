<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all()->sortByDesc('updated_at');
        return response()->json($images);
        // return view('index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

//        dd($request);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('public/image_posts/'),$imageName);

        $image = new Image;

        $image->image = $imageName;
        $image->user_id = auth()->id();
        if (isset($request->description)){
            $image->description = $request->description;
        }


        $image->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages/image.show',[
            'image' => Image::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::where('id',$id)->firstOrFail();
        return view('pages.image.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Image::find($id);

        $image->description = $request->description;
        $image->user_id = Auth::user()->id;
        $image->updated_at = time();

        $image->save();

        return redirect()->route('edit_image',$id)->with('message','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
