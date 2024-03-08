<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ArticlesController extends BaseController
{
    function show() {
        $data = Article::paginate(5);
        return view('articles', ['articles' => $data]);
    }
}
