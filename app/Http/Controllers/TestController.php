<?php

namespace App\Http\Controllers;

use App\Events\PostCreatedEvent;
use App\Http\Requests\StorePostRequest;
use App\Jobs\UploadPostExcelJob;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function testRoute()
    {
        $name = '<a>Max Mustermann</a>';
        $corona = false;
        $teilnehmer = [
            'Max Mustermann',
            'Peter Lustig',
            'Peter Meier',
        ];

//        $posts = Post::with(['user:name'])->get();
//
//        foreach ($posts as $post) {
//            echo $post->title . ' - ' . $post->user?->name;
//        }

//        $posts = DB::select('SELECT id FROM posts');

        $posts = Post::paginate(10);

        //$this->testFunc();

        return view('test', [
            'name' => $name,
            'corona' => $corona,
            'teilnehmer' => $teilnehmer,
            'posts' => $posts,
        ]);
    }

    public function storePost(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return 'Dein Post wurde gespeichert, ID: '.$post->id;
    }

    private function testFunc()
    {
        $category = Category::find(1);
        $post = $category->posts()->find(4);

        dd($post);
    }

    public function uploadForm()
    {
        return view('upload');
    }

    public function handleUpload(Request $request)
    {
        $file = $request->file('file');
        $filepath = '/uploads/'.$file->getClientOriginalName();

        Storage::put($filepath, $file->getContent());

        UploadPostExcelJob::dispatch($filepath);
    }
}
