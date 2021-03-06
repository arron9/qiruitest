<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定。
     *
     * @return void
     */
    public function boot()
    {
        // 使用基于类的 composer...
        View::composer(
            'layouts.layout', 'App\Http\ViewComposers\ProfileComposer'
        );
    }

    /**
     * 注册服务器提供者。
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
