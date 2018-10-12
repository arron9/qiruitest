<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
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

            $pids = $this->getCategories();
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
            $title  = $request->input('title');
            $alias  = $request->input('alias');
            $type   = $request->input('type');
            $desc   = $request->input('desc');
            $content = $request->input('content');
            $categoryId = $request->input('category_id');

            $cover = $this->singleUpload($request->file('cover'));

            $date = date('Y-m-d H:i:s');

            $article = new Article;
            $article->title = $title;
            $article->alias = $alias;
            $article->cover = $cover;
            $article->desc  = $desc;
            $article->type = $type;
            $article->content = $content;
            $article->category_id = $categoryId; 
            $article->status = 0;
            $article->author_id = 0;
            $article->created_at = $date;
            $article->updated_at = $date;

            $article->save();
        }  

        $grid = Admin::form(Article::class, function(Form $form){
            // 显示记录id
            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '标题');
            $form->text('alias', '副标题');

            $form->image('cover', '封面')->move('public/uploads/images/');
            $form->textarea('desc', '简介')->rows(10);

            $directors = $this->getCategories();
            $form->select('category_id', '所属栏目')->options($directors);

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
        $article = Article::find($id);
        if ($request->isMethod('post')) {
            $title  = $request->input('title');
            $alias  = $request->input('alias');
            $desc   = $request->input('desc');
            $type   = $request->input('type');
            $content = $request->input('content');
            $categoryId = $request->input('category_id');

            $cover = $request->file('cover');
            if ($cover) {
                $cover = $this->singleUpload($cover);
            } else {
                $cover  = $request->input('pic');
            }

            $date = date('Y-m-d H:i:s');

            $article->title = $title;
            $article->alias = $alias;
            $article->cover = $cover;
            $article->desc  = $desc;
            $article->type  = $type;
            $article->content = $content;
            $article->category_id = $categoryId; 
            $article->author_id = 0;
            $article->updated_at = $date;

            $article->update();
        } 

        $grid = Admin::form(Article::class, function(Form $form) use($id, $article) {
            // 添加text类型的input框
            $form->text('title', '标题')->value($article->title);
            $form->text('alias', '副标题')->value($article->alias);

            $form->image('cover', '封面')->value($article->cover);
            $form->hidden('pic')->value($article->cover);
            $form->textarea('desc', '简介')->rows(10)->value($article->desc);

            $directors = $this->getCategories();
            $form->select('category_id', '所属栏目')->options($directors)->value($article->category_id);;

            $types = [
                1 => '新闻',
                2 => '产品',
                3 => '其它',
            ];

            $form->select('type', '类型')->options($types)->value($article->type);

            // 两个时间显示
            $form->display('created_at', '创建时间')->value($article->created_at);
            $form->display('updated_at', '修改时间')->value($article->updated_at);

            $aa = $form->ckeditor('content', '内容')->value($article->content);

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
        $categories = Category::all();
        foreach($categories as $category) {
            $items[$category->id] = $category->name;
        }

        return $items;
    }

    private function singleUpload($file)
    {
        if ($file->isValid()) {
            if (in_array(strtolower($file->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                $picname = $file->getClientOriginalName();//获取上传原文件名
                $ext = $file->getClientOriginalExtension();//获取上传文件的后缀名
                // 重命名
                $filename = time() . str_random(6) . "." . $ext;
                if ($file->move("uploads/images", $filename)) {
                    $newFileName = '/images/' . $filename;

                    return $newFileName;
                } 
            }
        }

        return '';
    }

    public function ckeditorUploadImg(Request $request) {
        $file = $request->file('upload');
        $fileName = $this->singleUpload($file);

        $data = [
            'fileName' => $fileName,
            'uploaded' => 1, 
            'url' => env('APP_URL'). '/uploads/'. $fileName,
        ];

        return Response()->json($data);
    }

    public function multiUploadImg(Request $request)
    {
            $file = $request->file("files");
        // dd($file);
        if (!empty($file)) {
            foreach ($file as $key => $value) {
                $len = $key;
            }
            if ($len > 25) {
                return response()->json(['ResultData' => 6, 'info' => '最多可以上传25张图片']);
            }
            $m = 0;
            $k = 0;
            for ($i = 0; $i <= $len; $i++) {
                // $n 表示第几张图片
                $n = $i + 1;
                if ($file[$i]->isValid()) {
                    if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                        $picname = $file[$i]->getClientOriginalName();//获取上传原文件名
                        $ext = $file[$i]->getClientOriginalExtension();//获取上传文件的后缀名
                        // 重命名
                        $filename = time() . str_random(6) . "." . $ext;
                        if ($file[$i]->move("uploads/images", $filename)) {
                            $newFileName = '/' . "uploads/images" . '/' . $filename;
                            $m = $m + 1;
                            // return response()->json(['ResultData' => 0, 'info' => '上传成功', 'newFileName' => $newFileName ]);

                        } else {
                            $k = $k + 1;
                            // return response()->json(['ResultData' => 4, 'info' => '上传失败']);
                        }
                        $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                        $return[] = ['ResultData' => 0, 'info' => $msg, 'newFileName' => $newFileName];
                    } else {
                        return response()->json(['ResultData' => 3, 'info' => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式']);
                    }
                } else {
                    return response()->json(['ResultData' => 1, 'info' => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持2M']);
                }
            }

        } else {
            return response()->json(['ResultData' => 5, 'info' => '请选择文件']);
        }
        return $return;
    }
}
