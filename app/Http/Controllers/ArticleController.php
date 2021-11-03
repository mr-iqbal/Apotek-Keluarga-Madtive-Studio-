<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if(!empty($request->get('category'))) {
            $posts = DB::table('posts')
                    ->select('posts.*', 'users.name as author', 'categories.name')
                    ->join('categories', 'posts.category_id', 'categories.id')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->where('categories.name', 'like', '%'.$request->get('category'). '%')
                    ->get();
            // foreach ($posts as $key => $value) {
            //     $category = $value->category()->first();
            // }
        } else {
            $posts = Post::latest()->get();
        }
        return view('frontend.all_post',[
            'page'  => 'All Posts',
            'title' => 'Apotek Keluarga',
            'posts' => $posts,
            'categories' => Category::all()
        ]);
        // dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // untuk mengambil created_at berdasarkan waktu
        $carbon = Carbon::parse($post->created_at)->diffForHumans();
        // untuk membuat format hari,tanggal/bulan/tahun
        $date = date('l, d F Y',strtotime($post->created_at));
        return view('frontend.detail',[
            'page'      => 'Detail Post',
            'title'     => 'Apotek Keluarga',
            // untuk memanggil post berdasarkan post saat ini
            'post'      => $post,
            'carbon'    => $carbon,    
            'date'      => $date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
