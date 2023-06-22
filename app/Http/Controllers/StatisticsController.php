<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use App\Models\Posts;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    private function payload($code, $data = [])
    {
        return [
            'code' => $code,
            'data' => $data
        ];
    }
    public function index()
    {
        $statistics = Statistics::find(1);
        $posts = Posts::all();
        $feedback = FeedBack::all();
        return view('statistics.index', [
            'statistics' => $statistics,
            'posts' => $posts,
            'feedback' => $feedback
        ]);
    }


    public function count()
    {
        $stat = Statistics::find(1);
        if (!$stat) {
            Statistics::create([
                'visitors' => 0
            ]);
            return response()->json($this->payload(200));
        }
        $stat->update([
            'visitors' => $stat->visitors + 1
        ]);
        return response()->json($this->payload(200, $stat));
    }

    public function get()
    {
        $stat = Statistics::find(1);
        $posts = Posts::all();
        $feedback = FeedBack::all();
        $likes = 0;
        $views = 0;

        foreach ($posts as $post) {
            $likes = $likes + $post->likes;
            $views = $views + $post->views;
        }

        return response()->json([
            'code' => 200,
            'data' => [
                'visitors' => $stat->visitors,
                'posts' => count($posts),
                'feedback' => count($feedback),
                'likes' => $likes,
                'views' => $views,
                'post_data' => Posts::all()
            ]
        ]);
    }
}
