<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function testPage()
    {
        return view('test');
    }

    public function testApi()
    {
        return view('testApi');
    }

    public function get()
    {
        return json_encode("GET");
    }

    public function post(Request $request)
    {
        return json_encode("POST");
    }
}
