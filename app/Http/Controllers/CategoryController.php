<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use FFI;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $diffTime = array();
        foreach ($category as $key => $value) {
            array_push($diffTime, date('l, d F Y',strtotime($value->created_at)) . ' - ' . Carbon::parse($value->created_at)->diffForHumans());
        }
        // untuk mengambil created_at berdasarkan waktu
        // untuk membuat format hari,tanggal/bulan/tahun
        // $date = date('l, d F Y',strtotime($category->created_at));
        return view('dashboard.category.index',[
            'title' => 'Apotek Keluarga',
            'page'  => 'Categories',
            'categories' => Category::all(),
            'diffTime'  => $diffTime,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create',[
            'title' => 'Apotek Keluarga',
            'page'  => 'Create Category',
            'categories' => Category::all()
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
            'name'  => 'required|max:255|unique:categories',
            'slug'  => 'required|max:255|unique:categories'
        ]);
        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('succces','New Category has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('dashboard.category.edit',[
            'title' => 'Apotek Keluarga',
            'page'  => 'Edit Category',
            'categories' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'          => 'required|max:255',
            'slug'          => 'required' . $category->slug

        ];  
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($request->name);
        $category->where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success','Category has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success','Category has been deleted!');
    }
    

    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
    //     return response()->json(['slug' => $slug]);
    // }
}
