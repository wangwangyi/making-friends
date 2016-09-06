<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
class Category extends Model
{
    protected $fillable = ['name','parent_id'];

    public $timestamps = false;
    static function get_categories()
    {
        $categories = Cache::rememberForever('admin_category_categories', function () {
            return self::with(['children' =>function($query){
                $query->orderBy('id','asc');
            }])->where('parent_id',0)->orderBy('id','asc')->get();
        });
        return $categories;
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    static function clear()
    {
        Cache::forget('admin_category_categories');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    /**
     * 检查是否有子栏目
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * 检查当前分类是否有内容
     */
    static function check_articles($id)
    {
        $category = self::with('articles')->find($id);
        if ($category->articles->isEmpty()) {
            return true;
        }
        return false;
    }
    /**
     * 屏蔽掉没有内容的分类
     */
    static function filter_categories()
    {
        $categories = self::has('children.articles')->with(['children' => function ($query) {
            $query->has('articles');
        }])->get();
        return $categories;
    }
}
