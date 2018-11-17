<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getCategoryByKey($key)
    {
        return $result = Category::where('key', $key)
            ->first();
    }

    public function getTreeCategoryByPid($pid)
    {
        $category = new Category;
        $categories = $category
            ->orderBy('weight', 'desc')
            ->get()->toArray();

       return buildTree($categories, $pid);
    }

    public function getCategoryById($id)
    {
        return $result = Category::where('id', $id)
            ->first();
    }

    public function getCategoryByPid($pid)
    {
        return  Category::where('pid', $pid)
            ->orderBy('weight',' desc')
            ->first();
    }
}
