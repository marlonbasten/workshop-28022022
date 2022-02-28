<?php

namespace App\Http\Controllers;

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
}
