<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class ArticlesController extends Controller
{
    function show() {
        $data = Articles::paginate(5);
        return view('index', ['articles' => $data]);
    }
}
