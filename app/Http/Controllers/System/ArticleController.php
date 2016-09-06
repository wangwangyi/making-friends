<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Category;
use Validator;
use App\Models\Gallery;
class ArticleController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_article' => 'active']);
    }

    //验证
    private function messages()
    {
        return [
            'title.required' => '名称不能为空！',
            'category_id.required' =>'分类名称不能为空！',
        ];
    }

    public function index(Request $request)
    {
        $where = function ($query) use ($request) {

            if ($request->has('title') and $request->title != '') {
                $search = "%" . $request->title . "%";
                $query->where('title', 'like', $search);
            }
            if ($request->has('category_id') and $request->category_id != '-1') {
                $query->where('category_id', $request->category_id);
            }
        };
        $categories = Category::get_categories();
        $articles = Article::with('category')->where($where)->paginate(15);
        return view('system.article.index')->with('articles',$articles)
                                              ->with('categories',$categories);
    }

    public function create()
    {
        $categories = Category::get_categories();
        return view('system.article.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except([ 'file', 'imgs']);
        $article = Article::create($data);
        // return $article;

        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $article->galleries()->create(['imgs' => $img]);
            }
        }
        return redirect(route('admin.article.index'))->with('msg', '添加成功！');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::get_categories();
        return view('system.article.edit')->with('article',$article)
                                             ->with('categories',$categories);
    }

    public function update(Request $request,$id)
    {
        $data = $request->except([ 'file', 'imgs']);
        $article = Article::find($id);
        $article->update($data);
        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $article->galleries()->create(['imgs' => $img]);
            }
        }

        return redirect(route('admin.article.index'))->with('msg', '修改成功~');
    }

    /**
     * 多选删除
     * @param Request $request
     */
    function destroy_checked(Request $request)
    {
        $checked_id = $request->input("checked_id");
        $delete_id = [];

        foreach ($checked_id as $id) {
            $delete_id[] = $id;
        }
        Article::destroy($delete_id);
    }

    public function delete(Request $request)
    {
        Article::destroy($request->article_id);
    }

    //ajax删除相册图片
    public function destroy_gallery(Request $request)
    {
        Gallery::destroy($request->gallery_id);
    }

}
