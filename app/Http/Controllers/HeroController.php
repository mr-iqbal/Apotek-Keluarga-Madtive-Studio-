<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hero $hero)
    {   
        $hero = Hero::all();
        return view('dashboard.hero.index',[
            'title'     => 'Apotek Keluarga',
            'page'      => 'Hero Section',
            'heroes'    => $hero
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hero $hero)
    {

        return view('dashboard.hero.create',[
            'title'     => 'Apotek Keluarga',
            'page'      => 'Create Hero Section',
            'heroes'    => $hero
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
            'title'         => 'required|max:255',
            'description'   => 'required|max:255',
        ]);
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('hero-images');
        }

        Hero::create($validatedData);
        return redirect('/dashboard/hero')->with('success','New Hero has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return view('dashboard.hero.edit',[
            'title' => 'Apotek Keluarga',
            'page'  => 'Edit Hero Section',
            'hero'  => $hero
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        $rules = [
            'title'         => 'required|max:255',
            'description'   => 'required|max:255',
            'image'         => 'image|file|max:2048',
        ];  

        $validatedData = $request->validate($rules);

        //untuk mengecek apakah sebelumnya punya image atau belum, jika sudah maka image yang lama akan dihapus
        //diganti dengan yang baru
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($hero->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('hero-images');
        }
        
        $hero->where('id', $hero->id)->update($validatedData);
        return redirect('/dashboard/hero')->with('success','Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        if($hero->image){
            Storage::delete($hero->image);
        }
        Hero::destroy($hero->id);
        return redirect('/dashboard/hero')->with('success','Hero has been deleted!');
    }
}
