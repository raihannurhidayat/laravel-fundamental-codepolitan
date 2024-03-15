<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Storage::get("posts.txt");
        // $posts = explode("\n", $posts);

        // Query Builder start
        // $posts = DB::table("posts")->select('id', 'title', 'content', 'created_at', 'updated_at')->where('active', true)->get();
        // Query Builder end
        if (!Auth::check()) {
            return redirect("login");
        }
        // Eloquent start
        $posts = Post::active()->get();
        // $posts = Post::active()->withTrashed()->get();
        // Eloquent end

        $viewData = [
            "posts" => $posts,
            "user" => Auth::user()["name"]
        ];
        return view("posts.index", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::check()) {
            return redirect("login");
        }
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        $title = $request->input("title");
        $content = $request->input("content");

        // query builder start
        // DB::table('posts')->insert([
        //     'title' => $title,
        //     'content' => $content,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        // query builder end

        // eloquent start
        $post = Post::create([
            'title' => $title,
            'content' => $content,
        ]);
        // eloquent end

        // $posts = Storage::get("posts.txt");
        // $posts = explode("\n", $posts);

        // $newPost = [
        //     count($posts) + 1,
        //     $title,
        //     $content,
        //     date('Y-m-d H:i:s')
        // ];

        // $newPost = implode(',', $newPost);

        // array_push($posts, $newPost);
        // $posts = implode("\n", $posts);

        // Storage::write('posts.txt', $posts);

        Mail::to(Auth::user()['email'])->send(new BlogPosted($post));

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        $selectedPost = Post::where('id', "=", $id)->first();

        $comments = $selectedPost->comments()->get();
        $count = $selectedPost->comments_count();

        $viewData = [
            "post" => $selectedPost,
            "comments" => $comments,
            "count" => $count
        ];

        return view("posts.show", $viewData);


        // $posts = Storage::get("posts.txt");
        // $posts = explode("\n", $posts);
        // $selectedPost = array();
        // foreach ($posts as $post) {
        //     $post = explode(",", $post);
        //     if ($post[0] == $id) {
        //         $selectedPost = $post;
        //     }
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        if (!Auth::check()) {
            return redirect("login");
        }
        $post = Post::where('id', '=', $id)->first();
        $viewData = [
            "post" => $post
        ];

        return view("posts.edit", $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        $title = $request->input("title");
        $content = $request->input("content");

        // dd($title, $content);

        Post::where("id", $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect("posts/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect("login");
        }
        Post::where('id', $id)->delete();

        return redirect("posts");
    }
}
