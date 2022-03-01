<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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

        return view('test', [
            'name' => $name,
            'corona' => $corona,
            'teilnehmer' => $teilnehmer,
        ]);
    }

    public function storePost(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return 'Dein Post wurde gespeichert, ID: '.$post->id;
    }
}
