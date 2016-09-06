<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Validator;
class CategoryController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
       /* $this->middleware('role:admin|owner');*/
        view()->share(['_cate' => 'active']);
    }

    private function messages()
    {
        return [
            'name.required' => '分类名称不能为空！',
            'name.unique' => '分类名称不能重复！',
        ];
    }

    public function index()
    {
        $categories = Category::get_categories();
        return view('system.category.index')->with('categories',$categories);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Category::create($request->all());
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg','新增分类成功！');
    }

    public function edit($id)
    {
        $categories = Category::get_categories();
        $category = Category::find($id);
        return view('system.category.edit')->with('categories',$categories)
                                              ->with('category',$category);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $category = Category::find($id);
        $category->update($request->all());
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg', '编辑成功~');
    }

    public function destroy($id)
    {
        if (!Category::check_children($id)) {
            return back()->with('msg', '当前分类有子分类，请先将子分类删除后再尝试删除~');
        }

        if (!Category::check_articles($id)) {
            return back()->with('msg', '当前分类有内容，请先将对应内容删除后再尝试删除~');
        }
        Category::destroy($id);
        Category::clear();
        return back()->with('删除成功！');
    }
}
