<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Purchase;
use App\Models\Favorite;
use Illuminate\Support\Facades\Storage;

class NavigationController extends Controller
{
    //
    public function dasha()
    {
        return view('dasha');
    }

    public function dashb()
    {
        return view('dashb');
    }

    public function dashc()
    {
        return view('dashc');
    }
    public function dashd()
    {
        return view('dashd');
    }
}
