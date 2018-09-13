<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

class NewsController extends Controller
{
    public function index()
    {

        $grid = Admin::grid(Movie::class, function(Grid $grid){

            // 第一列显示id字段，并将这一列设置为可排序列
            $grid->id('ID')->sortable();

            // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
            $grid->column('title', '标题');

            // 第四列显示为describe字段
            $grid->describe();

            // 第五列显示为rate字段
            $grid->rate();

            // 第六列显示released字段，通过display($callback)方法来格式化显示输出
            $grid->released('上映?')->display(function ($released) {
                return $released ? '是' : '否';
            });

            // 下面为三个时间字段的列显示
            $grid->release_at();
            $grid->created_at();
            $grid->updated_at();

            // filter($callback)方法用来设置表格的简单搜索框
            $grid->filter(function ($filter) {

                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
            });
        });

        return Admin::content(function (Content $content) use($grid){

            $content->description('添加新闻');

            $content->row($grid);
        });
    }

    public function create()
    {
        $grid = Admin::form(Movie::class, function(Form $form){

            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '电影标题');

            $directors = [
                'John'  => 1,
                'Smith' => 2,
                'Kate'  => 3,
            ];

            $form->select('director', '导演')->options($directors);

            // 添加describe的textarea输入框
            $form->textarea('describe', '简介');

            // 数字输入框
            $form->number('rate', '打分');

            // 添加开关操作
            $form->switch('released', '发布？');

            // 添加日期时间选择框
            $form->dateTime('release_at', '发布时间');

            // 两个时间显示
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction('');
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('添加新闻');
            $content->row($grid);
        });
    }

    public function edit($id)
    {
        $grid = Admin::form(Movie::class, function(Form $form) use($id) {
            $movieInfo = Movie::find($id);
            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '电影标题')->value($movieInfo->title);

            $directors = [
                'John'  => 1,
                'Smith' => 2,
                'Kate'  => 3,
            ];

            $form->select('director', '导演')->options($directors)->value($movieInfo->director);;

            // 添加describe的textarea输入框
            $form->textarea('describe', '简介')->value($movieInfo->describe);

            // 数字输入框
            $form->number('rate', '打分');

            // 添加开关操作
            $form->switch('released', '发布？');

            // 添加日期时间选择框
            $form->dateTime('release_at', '发布时间');

            // 两个时间显示
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction('');
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('编辑新闻');
            $content->row($grid);
        });

    }
}
