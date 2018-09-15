<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

class ArticleController extends Controller
{
    public function index()
    {

        $grid = Admin::grid(Article::class, function(Grid $grid) {

            $grid->id('id')->sortable();

            $pids = array_merge(['顶级目录'],$this->getCategories());
            $grid->category_id('栏目分类')->display(function($categoryId) use($pids) {
                return $pids[$categoryId];
            });

            $grid->column('title', '标题');
            $grid->column('cover', '封面');

            $grid->type('类型')->display(function ($type) {
                switch ($type) {
                case 3:
                    $text = '其它';
                    break;
                case 2:
                    $text = '产品';
                    break;
                default:
                    $text = '新闻';
                    break;
                }

                return $text;
            });

            $grid->status('状态')->display(function ($status) {
                switch ($status) {
                    case 1:
                        $text = '已发布';
                        break;
                    case 2:
                        $text = '已下线';
                        break;
                    case 3:
                        $text = '已删除';
                        break;
                    default:
                        $text = '未发布';
                        break;
                }

                return $text;
            });

            $grid->column('author_id', '作者id');
            $grid->column('created_at', '创建时间');
            $grid->column('updated_at', '更新时间');

            // filter($callback)方法用来设置表格的简单搜索框
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
            });
        });

        return Admin::content(function (Content $content) use($grid){

            $content->description('文章列表');

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

            $date = date('Y-m-d H:i:s');

            $category = new Article;
            $category->name = $name;
            $category->pid = $pid;
            $category->status = $status;
            $category->weight = $weight;
            $category->created_at = $date;
            $category->updated_at = $date;

            $category->save();
        }  

        $grid = Admin::form(Article::class, function(Form $form){
            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '标题');
            $form->text('alias', '副标题');

            $form->image('cover', '封面')->move('public/upload/image/');
            $form->textarea('desc', '简介')->rows(10);

            $directors = [
                '0'  => '顶级目录',
            ];

            $directors = array_merge($directors, $this->getCategories());
            $form->select('pid', '所属栏目')->options($directors);

            $types = [
                1 => '新闻',
                2 => '产品',
                3 => '其它',
            ];
            $form->select('type', '类型')->options($types);

            // 两个时间显示
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');

            $aa = $form->ckeditor('content', '内容');

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction('/admin/article/create');
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
            $pid    = intval($request->input('pid'));
            $status = $request->input('status') == 'on'? 0: 1;
            $weight = intval($request->input('weight'));

            $date = date('Y-m-d H:i:s');
            $data = [
                'name' => $name,
                'pid' => $pid,
                'status' => $status,
                'weight' => $weight,
                'created_at' => $date,
                'updated_at' => $date,
            ];

            Article::where('id', $id)
                ->update($data);
        } 

        $grid = Admin::form(Article::class, function(Form $form) use($id) {
            $category = Article::find($id);

            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '标题');
            $form->text('alias', '副标题');

            $form->image('cover','封面');
            $form->textarea('desc', '简介')->rows(10);
            $form->editor('content', '内容');

            $directors = [
                '0'  => '顶级目录',
            ];

            $directors = array_merge($directors, $this->getCategories());
            $form->select('pid', '所属栏目')->options($directors);


            $types = [
                1 => '新闻',
                2 => '产品',
                3 => '其它',
            ];
            $form->select('type', '类型')->options($types);

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

            $form->setAction("/admin/article/{$id}/edit");
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('编辑文章');
            $content->row($grid);
        });

    }

    private function getCategories()
    {
        $items = [];
        $categories = Article::all();
        foreach($categories as $category) {
            $items[$category->id] = $category->name;
        }

        return $items;
    }
}
