<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class ProfileComposer
{
    /**
     * 用户 repository 实现。
     *
     * @var UserRepository
     */
    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $category = new Category;
        $categories = $category->orderBy('weight', 'desc')
            ->get()->toArray();

        $treeCategories = $this->buildTree($categories);
        $view->with('categories', $treeCategories);
    }

    private function buildTree($data, $pid = 0) 
    {
        $all = array();
        foreach ($data as $key => $item) {
            if ($item['pid'] == $pid) {
                 $children =  $this->buildTree($data, $item['id']);
                 if (!empty($children)) {
                     $item['children'] = $children;
                 }
                $all[] = $item;
            }
        }

        return $all;
    }


}
