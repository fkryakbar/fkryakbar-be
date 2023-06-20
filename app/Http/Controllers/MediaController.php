<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $files = Media::all();
        return view('media.index', [
            'files' => $files
        ]);
    }


    public function upload(Request $request)
    {
        $request->validate([
            'media' => 'required'
        ]);

        // dd($request->files);

        foreach ($request->file('media') as $file) {
            $path = $file->store('');
            Media::create([
                'name' => $file->getClientOriginalName(),
                'type' => $file->getClientOriginalExtension(),
                'media_path' => $path
            ]);
        }

        return back()->with('message', 'File Uploaded');
    }

    public function delete($path)
    {
        Storage::delete($path);
        Media::where('media_path', $path)->first()->delete();

        return back()->with('message', 'File Deleted');
    }
}
