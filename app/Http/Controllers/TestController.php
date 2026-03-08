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

    public function get()
    {
        return json_encode('test GET');
    }

    public function post(Request $request)
    {
        $data = $request->all();
        return json_encode($data);
    }

}
