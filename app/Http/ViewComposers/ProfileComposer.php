<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

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
        $view->with('product', '标题');
    }
}
