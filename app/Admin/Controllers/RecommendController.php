<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommend;
use App\Models\Position;
use App\Models\Article;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

class RecommendController extends Controller
{
    public function index()
    {
        $grid = Admin::grid(Recommend::class, function(Grid $grid) {

            $grid->id('id')->sortable();
            $grid->column('title', '名称');
            $grid->position_id('推荐位置')->display(function($positionId){
                return Position::find($positionId)->name;
            });

            $grid->status('状态')->display(function ($status) {
                switch ($status) {
                    case 1:
                        $text = '启用';
                        break;
                    case 2:
                        $text = '禁用';
                        break;
                    default:
                        $text = '启用';
                        break;
                }

                return $text;
            });

            $grid->cover()->image('/uploads/', 100, 100);
            $grid->column('weight', '权重');
            $grid->column('created_at', '创建时间');
            $grid->column('updated_at', '更新时间');

            // filter($callback)方法用来设置表格的简单搜索框
            $grid->filter(function ($filter) {
                // 设置created_at字段的范围查询
                $filter->between('created_at', 'Created Time')->datetime();
            });
        });

        return Admin::content(function (Content $content) use($grid){
            $content->description('推荐位列表');
            $content->row($grid);
        });
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $title = $request->input('title');
            $intro = $request->input('intro');
            //$itemid = $request->input('itemid');
            $positionId = $request->input('position_id');
            $status = $request->input('status') == 'on'? 0: 1;
            $targetUrl = $request->input('target_url');

            $file = $request->file('cover');
            if ($file) {
                $cover = $this->singleUpload($file);
            } else {
                $cover = '';
            }

            $weight = $request->input('weight');

            $date = date('Y-m-d H:i:s');

            $recommend             = new Recommend;
            $recommend->title      = $title;
            $recommend->intro      = $intro;
            $recommend->type       = 1;

            $recommend->itemid     = 0;
            $recommend->position_id = $positionId;
            $recommend->status     = $status;
            $recommend->target_url  = $targetUrl;
            $recommend->cover      = $cover;
            $recommend->weight     = $weight;
            $recommend->created_at = $date;
            $recommend->updated_at = $date;
            $recommend->save();
        }  

        $grid = Admin::form(Recommend::class, function(Form $form){
            $form->display('id', 'ID');
            $form->text('title', '标题');

            $positions = Position::getPositions();
            $form->select('position_id', '推荐位')->options($positions);

/*             $types = [ */
            //     '1' => '文章',
            //     '2' => '图片'
            // ];
            // $form->radio('type', '资源类型')->options($types);
            /* $form->select('itemid', '推荐文章')->options(function ($id) { */
                // $article = Article::find($id);
                // if ($article) {
                //     return [$article->id => $article->name];
                // }
            /* })->ajax("/admin/recommend/articles"); */

            $form->image('cover', '图片')->move('/uploads/images/');
            $form->textarea('intro', '简介')->rows(10);
            $form->text('target_url', '链接');

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

            $form->setAction('/admin/recommend/create');
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('添加推荐资源');
            $content->row($grid);
        });
    }

    public function edit(Request $request, $id)
    {
        $recommend= Recommend::find($id);
        if ($request->isMethod('post')) {
            $title = $request->input('title');
            $intro = $request->input('intro');
            // $itemid = $request->input('itemid');
            $positionId = $request->input('position_id');
            $status = $request->input('status') == 'on'? 0: 1;
            $targetUrl = $request->input('target_url');

            $cover = $request->file('cover');
            if ($cover) {
                $cover = $this->singleUpload($cover);
            } else {
                $cover  = $request->input('pic');
            }

            $weight = $request->input('weight');
            $date = date('Y-m-d H:i:s');

            $recommend->title      = $title;
            $recommend->intro      = $intro;
            $recommend->type       = 1;
            $recommend->itemid     = 0;
            $recommend->position_id = $positionId;
            $recommend->status     = $status;
            $recommend->target_url  = $targetUrl;
            $recommend->cover      = $cover;
            $recommend->weight     = $weight;
            $recommend->created_at = $date;
            $recommend->updated_at = $date;
            $recommend->update();
        }  

        $grid = Admin::form(Recommend::class, function(Form $form) use ($id, $recommend){
            $form->display('id', 'ID');
            $form->text('title', '标题')->value($recommend->title);

            $positions = Position::getPositions();
            $form->select('position_id', '推荐位')->options($positions)->value($recommend->position_id);

            /*             $types = [ */
            //     '1' => '文章',
            //     '2' => '图片'
            // ];
            // $form->radio('type', '资源类型')->options($types);
            /* $form->select('itemid', '推荐文章')->options(function($id) { */
            //     $article = Article::find($id);
            //     if ($article) {
            //         return [$article->id => $article->name];
            //     }
            // })->ajax("/admin/recommend/articles")->value($recommend->itemid);

            $form->image('cover', '封面')->value($recommend->cover);
            $form->hidden('pic')->value($recommend->cover);

            $form->textarea('intro', '简介')->rows(10)->value($recommend->intro);
            $form->text('target_url', '链接')->value($recommend->target_url);

            $form->number('weight', '权重')->value($recommend->weight);
            $states = [
                'on'  => ['value' => 0, 'text' => '启用', 'color' => 'success'],
                'off' => ['value' => 1, 'text' => '禁用', 'color' => 'danger'],
            ];

            $form->switch('status', '状态')->states($states)->value($recommend->status);

            // 两个时间显示
            $form->display('created_at', '创建时间')->value($recommend->created_at);
            $form->display('updated_at', '修改时间')->value($recommend->updated_at);;

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction("/admin/recommend/{$id}/edit");
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('编辑推荐资源');
            $content->row($grid);
        });
    }

    public function articles(Request $request)
    {
        $q = $request->get('q');

        return Article::where('title', 'like', "%$q%")->paginate(null, ['id', 'title as text']);
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
