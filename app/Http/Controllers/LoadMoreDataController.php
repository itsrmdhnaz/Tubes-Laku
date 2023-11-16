<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoadMoreDataController extends Controller
{
    public function index(){
    return view('user.load');
    }
}
