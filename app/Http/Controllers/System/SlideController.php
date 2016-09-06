<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use App\Models\Slide;
use Validator;
class SlideController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_slide' => 'active']);
    }
    //验证
    private function messages()
    {
        return [
            'article_id.required' =>'内容选择不能为空！',
        ];
    }


    public function index()
    {
        $slides = Slide::with('article')->get();
        return view('system.slide.index')->with('slides',$slides);
    }

    public function create()
    {
        $where = function ($query)  {
                $query->has('articles');
        };
        $select_article = Category::where("parent_id","!=",0)->where($where)->get();
        foreach ($select_article as &$c)
        {
            $c["articles"] = Article::where("category_id","=",$c["id"])->get();
        }
        return view('system.slide.create')->with('select_article',$select_article);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'article_id' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Slide::create($request->all());
        return redirect(route('admin.slides.index'));
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        $where = function ($query)  {
            $query->has('articles');
        };
        $select_article = Category::where("parent_id","!=",0)->where($where)->get();
        foreach ($select_article as &$c)
        {
            $c["articles"] = Article::where("category_id","=",$c["id"])->get();
        }
        return view('system.slide.edit')->with('slide',$slide)
                                           ->with('select_article',$select_article);
    }

    public function update(Request $request,$id)
    {
        $slide = Slide::find($id);
        $slide->update($request->all());
        return redirect(route('admin.slides.index'));
    }

    public function delete(Request $request)
    {
        Slide::destroy($request->slide);
    }
}
