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
        $treeCategories = $this->buildTreeCategories(0);
        $view->with('categories', $treeCategories);
    }

    private function buildTreeCategories($pid = 0) {
        $categories = Category::where('pid', $pid)
            ->orderBy('weight', 'desc')
            ->get();

        var_dump($categories);exit;
    }

}
