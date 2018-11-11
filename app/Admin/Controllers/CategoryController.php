<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

class CategoryController extends Controller
{
    public function index()
    {

        $grid = Admin::grid(Category::class, function(Grid $grid) {

            $grid->id('id')->sortable();

            $grid->column('name', '名称');

            $grid->column('key', '关键字');

            $pids = array_merge(['/根目录'],$this->getCategories());
            $grid->pid('所属栏目')->display(function($pid) use($pids) {
                return $pids[$pid];
            });

            $grid->status('状态')->display(function ($status) {
                switch ($status) {
                    case 1:
                        $text = '禁用';
                        break;
                    case 9:
                        $text = '删除';
                        break;
                    default:
                        $text = '启用';
                        break;
                }

                return $text;
            });

            $grid->column('weight', '排序权重');
            $grid->column('created_at', '创建时间');
            $grid->column('updated_at', '更新时间');

            // filter($callback)方法用来设置表格的简单搜索框
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
            });
        });

        return Admin::content(function (Content $content) use($grid){

            $content->description('栏目列表');

            $content->row($grid);
        });
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $name   = $request->input('name');
            $pid    = intval($request->input('pid'));
            $status = $request->input('status') == 'on'? 0: 1;
            $weight = intval($request->input('weight'));
            $key    = $request->input('key');

            $date = date('Y-m-d H:i:s');

            $category             = new Category;
            $category->name       = $name;
            $category->pid        = $pid;
            $category->status     = $status;
            $category->weight     = $weight;
            $category->key        = $key;
            $category->created_at = $date;
            $category->updated_at = $date;

            $category->save();
        }  

        $grid = Admin::form(Category::class, function(Form $form){

            
            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('name', '栏目名称');
            $form->text('key', '关键字');

            $directors = [
                '0'  => '/根目录',
            ];

            $directors = array_merge($directors, $this->getCategories());

            $form->select('pid', '所属栏目')->options($directors);


            // 数字输入框
            $form->number('weight', '权重');

            $states = [
                'on'  => ['value' => 0, 'text' => '启用', 'color' => 'success'],
                'off' => ['value' => 1, 'text' => '禁用', 'color' => 'danger'],
            ];

            $form->switch('status', '状态')->states($states);

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

            $form->setAction('/admin/category/create');
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('添加栏目');
            $content->row($grid);
        });
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $name   = $request->input('name');
            $key = $request->input('key');
            $pid    = intval($request->input('pid'));
            $status = $request->input('status') == 'on'? 0: 1;
            $weight = intval($request->input('weight'));

            $date = date('Y-m-d H:i:s');
            $data = [
                'name' => $name,
                'key' => $key,
                'pid' => $pid,
                'status' => $status,
                'weight' => $weight,
                'created_at' => $date,
                'updated_at' => $date,
            ];

            Category::where('id', $id)
                ->update($data);
        } 

        $grid = Admin::form(Category::class, function(Form $form) use($id) {
            $category = Category::find($id);
            // 显示记录id
            $form->display('id', 'ID')->value($category->id);

            $form->text('name', '栏目名称')->value($category->name);
            $form->text('key', '关键字')->value($category->key);

            $directors = [
                '0'  => '/根目录',
            ];

            $directors = array_merge($directors, $this->getCategories());
            $form->select('pid', '所属栏目')->options($directors)->value($category->pid);


            // 数字输入框
            $form->number('weight', '权重')->value($category->weight);

            $states = [
                'on'  => ['value' => 0, 'text' => '启用', 'color' => 'success'],
                'off' => ['value' => 1, 'text' => '禁用', 'color' => 'danger'],
            ];

            $form->switch('status', '状态')->states($states)->value($category->status);

            // 两个时间显示
            $form->display('created_at', '创建时间')->value($category->created_at);
            $form->display('updated_at', '修改时间')->value($category->updated_at);

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction("/admin/category/{$id}/edit");
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('编辑栏目');
            $content->row($grid);
        });

    }

    private function getCategories()
    {
        $items = [];
        $categories = Category::all();
        foreach($categories as $category) {
            $items[$category->id] = $category->name;
        }

        return $items;
    }
}
