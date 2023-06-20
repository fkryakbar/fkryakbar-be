<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private function payload($code, $data = [])
    {
        return [
            'code' => $code,
            'data' => $data
        ];
    }
    public function get_stat($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        if (!$post) {
            $newpost = Posts::create([
                'slug' => $slug,
                'likes' => 0,
                'views' => 0
            ]);
            return response()->json($this->payload(200, $newpost));
        }

        return response()->json($this->payload(200, $post));
    }

    public function count_likes($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        if (!$post) {
            $newpost = Posts::create([
                'slug' => $slug,
                'likes' => 1,
                'views' => 1
            ]);
            return response()->json($this->payload(200, $newpost));
        }

        $post->update([
            'likes' => $post->likes + 1
        ]);

        return response()->json($this->payload(200, $post));
    }
    public function count_views($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        if (!$post) {
            $newpost = Posts::create([
                'slug' => $slug,
                'likes' => 0,
                'views' => 1
            ]);
            return response()->json($this->payload(200, $newpost));
        }

        $post->update([
            'views' => $post->views + 1
        ]);

        return response()->json($this->payload(200, $post));
    }

    public function index()
    {
        $posts = Posts::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function delete($slug)
    {
        Posts::where('slug', $slug)->first()->delete();

        return back()->with('message', 'Counter Deleted');
    }
}
