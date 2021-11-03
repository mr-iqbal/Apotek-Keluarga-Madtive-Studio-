<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('dashboard.gallery.index',[
            'title'     => 'Apotek Keluarga', 
            'page'      => 'Galleries',
            'galleries' => $gallery

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.create',[
            'page'      => 'Image Gallery',
            'title'     => 'Apotek Keluarga'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'     => 'required|max:255',
            'slug'      => 'required|max:255|unique:galleries',
            'image'     => 'image|file|max:2048',
            'note'      => 'required|max:255'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::create($validatedData);
        return redirect('/dashboard/galleries')->with('success','New image has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit',[
            'page'      => 'Edit Image Gallery',
            'title'     => 'Apotek Keluarga',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {

        $validatedData = $request->validate([
            'title'     => 'required|max:255',
            'slug'      => 'required|max:255|unique:galleries',
            'image'     => 'image|file|max:2048',
            'note'      => 'required|max:255'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gallery-images');
        }

        Gallery::create($validatedData);
        return redirect('/dashboard/galleries')->with('success','New Image has been added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
            Storage::delete($gallery->image);
        }
        Gallery::destroy($gallery->id);
        return redirect('/dashboard/galleries')->with('success','Image has been deleted!');
    }
}
