<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;

class ArticlesController extends BaseController
{
    function show() {
        $data = Articles::paginate(5);
        return view('articles', ['articles' => $data]);
    }
}
