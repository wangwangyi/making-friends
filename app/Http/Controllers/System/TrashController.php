<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;
use App\Models\Gallery;
class TrashController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_article' => 'active']);
    }

    public function index()
    {
        $articles = Article::onlyTrashed()->with('category')->paginate();
        return view('system.trash.index')->with('articles',$articles);
    }

    //还原
    public function restore(Request $request)
    {
        Article::withTrashed()->where('id',$request->article_id)->restore();
    }

    //删除
    public function delete($id)
    {
        Article::onlyTrashed()->where('id', $id)->forceDelete();
        Gallery::where("article_id",$id)->delete();
        return back()->with('msg','删除成功');
    }

}
