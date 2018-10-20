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

        $treeCategories = buildTree($categories);
        $view->with('categories', $treeCategories);
    }

    


}
