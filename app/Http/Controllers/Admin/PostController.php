<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        // if status is zero hide the category
        $category = Category::where('status', '0')->get();
        return view('admin.post.create', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $posts = new Post;
        $posts->category_id = $data['category_id'];
        $posts->name = $data['name'];
        $posts->slug = $data['slug'];
        $posts->description = $data['description'];
        $posts->yt_iframe = $data['yt_iframe'];
        $posts->meta_title = $data['meta_title'];
        $posts->meta_description = $data['meta_description'];
        $posts->meta_keyword = $data['meta_keyword'];
        $posts->status = $request->status == true ? '1' : '0';
        $posts->created_by = Auth::user()->id;
        $posts->save();

        return redirect('admin/posts')->with('status', 'Post added Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id): View
    {
        $post = Post::find($post_id);
        $category = Category::where('status', '0')->get();
        return view('admin.post.edit', compact(['post', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $post = Post::find($post_id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect('admin/posts')->with('status', 'Post updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('admin/posts')->with('status', 'Post deleted Successfully');

    }
}
