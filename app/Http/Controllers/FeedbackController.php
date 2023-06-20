<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = FeedBack::all();
        return view('feedback.index', [
            'feedback' => $feedback
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'name' => ['required', 'max:30'],
            'feedback' => ['required', 'max:400'],
        ]);

        $data = FeedBack::create($request->except(['_token']));
        return response()->json([
            'message' => 'success',
            'code' => 200,
            'data' => $data
        ]);
    }

    public function delete($id)
    {
        FeedBack::where('id', $id)->first()->delete();
        return back()->with('message', 'Feedback Deleted');
    }
}
