<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use JWTAuth;
class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::query()->with('author');
        // 'select * from posts where LIKE %$request->title%'
        if ($request->title) { 
            $posts->where('title', 'LIKE', "%$request->title%");
        }

        // 'select * from posts order_by $request->order_by desc'
        if ($request->order_by) { 
            $posts->orderBy($request->order_by, 'DESC');
        }

        return $posts->paginate(5);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return JWTAuth::user();
        // Post::create($request->all());
        JWTAuth::user()->posts()->create($request->all());
        return 'Post created';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        JWTAuth::user()->posts()->findOrFail($id)->update($request->all());
        return 'Post updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return 'Post deleted';
    }
}
