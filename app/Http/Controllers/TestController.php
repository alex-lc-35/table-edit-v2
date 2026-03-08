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

}
