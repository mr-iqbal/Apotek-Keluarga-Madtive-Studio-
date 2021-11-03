<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //untuk mengambil posts yang telah dibuat oleh user
        $post = Post::with('category')->where('user_id', auth()->user()->id)->get();
        // dd($post);
        return view('dashboard.posts.index',[
            'page'  => 'My Posts',
            'title' => 'Apotek Keluarga',
            'posts' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.posts.create',[
            'page'          => 'Create Post',
            'title'         => 'Apotek Keluarga',
            'categories'    => Category::all()
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
            'category_id'   => 'required',
            'image'         => 'image|file|max:2048',
            'body'          => 'required',
            'slug'          => 'required|unique:posts'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success','New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'page'          => 'Detail Post',
            'title'         => 'Apotek Keluarga',
            'post'          => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('dashboard.posts.edit',[
            'page'          => 'Edit Post',
            'title'         => 'Apotek Keluarga',
            'categories'    => Category::all(),
            'post'          => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title'         => 'required|max:255',
            'category_id'   => 'required',
            'image'         => 'image|file|max:2048',
            'body'          => 'required'
        ];  
        // dd($post);
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique: posts, slug,' . $post->id;
        }

        $validatedData = $request->validate($rules);

        /*untuk mengecek apakah sebelumnya punya image atau belum, jika sudah maka image yang lama akan dihapus
        diganti dengan yang baru*/
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($post->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $post->where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success','Post Has Been Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success','Post has been deleted!');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
