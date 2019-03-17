<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Encore\Admin\Grid;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;

class PositionController extends Controller
{
    public function index()
    {
        $grid = Admin::grid(Position::class, function(Grid $grid) {

            $grid->id('id')->sortable();
            $grid->column('name', '名称');
            $grid->column('key', '标识符');
            $grid->cover()->image('/uploads/', 100, 100);

            $pids = array_merge(['/根目录'],Position::getPositions());
            $grid->pid('父推荐位')->display(function($pid) use($pids) {
                return $pids[$pid];
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
            $key  = $request->input('key');
            $name = $request->input('name');
            $desc = $request->input('desc');
            $url  = $request->input('url');
            $status = $request->input('status') == 'on'? 0: 1;
            $pid    = intval($request->input('pid'));

            $cover = $this->singleUpload($request->file('cover'));
            $date = date('Y-m-d H:i:s');

            $position             = new Position;
            $position->key        = $key;
            $position->name       = $name;
            $position->cover      = $cover;
            $position->desc       = $desc;
            $position->url        = $url;
            $position->status     = $status;
            $position->pid        = $pid;
            $position->created_at = $date;
            $position->updated_at = $date;
            $position->save();
        }  

        $grid = Admin::form(Position::class, function(Form $form){
            // 显示记录id
            $form->display('id', 'ID');
            $form->text('name', '名称');
            $form->text('key', '唯一标识');

            $directors = [
                '0'  => '/根目录',
            ];
            $directors = array_merge($directors, Position::getPositions());
            $form->select('pid', '父推荐位')->options($directors);

            $form->image('cover', '封面')->move('/uploads/images/');
            $form->textarea('desc', '简介')->rows(10);
            $form->text('url', '链接');

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

            $form->setAction('/admin/position/create');
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('添加推荐位');
            $content->row($grid);
        });
    }

    public function edit(Request $request, $id)
    {
        $position = Position::find($id);
        if ($request->isMethod('post')) {
            $key  = $request->input('key');
            $name = $request->input('name');
            $desc = $request->input('desc');
            $url  = $request->input('url');
            $status = $request->input('status') == 'on'? 0: 1;
            $pid    = intval($request->input('pid'));

            $cover = $request->file('cover');
            if ($cover) {
                $cover = $this->singleUpload($cover);
            } else {
                $cover  = $request->input('pic');
            }


            $date = date('Y-m-d H:i:s');
            $position->key        = $key;
            $position->name       = $name;
            $position->cover      = $cover;
            $position->desc       = $desc;
            $position->url        = $url;
            $position->status     = $status;
            $position->pid        = $pid;
            $position->updated_at = $date;

            $position->update();
        } 

        $grid = Admin::form(Position::class, function(Form $form) use($id, $position) {
            $form->text('name', '名称')->value($position->name);
            $form->text('key', '唯一标识')->value($position->key);;

            $directors = [
                '0'  => '/根目录',
            ];
            $directors = array_merge($directors, Position::getPositions());
            $form->select('pid', '父推荐位')->options($directors)->value($position->pid);

            $form->image('cover', '封面')->value($position->cover);
            $form->hidden('pic')->value($position->cover);
            $form->textarea('desc', '简介')->rows(10)->value($position->desc);
            $form->text('url', '链接')->value($position->url);

            $states = [
                'on'  => ['value' => 0, 'text' => '启用', 'color' => 'success'],
                'off' => ['value' => 1, 'text' => '禁用', 'color' => 'danger'],
            ];

            $form->switch('status', '状态')->states($states)->value($position->status);

            // 两个时间显示
            $form->display('created_at', '创建时间')->value($position->created_at);
            $form->display('updated_at', '修改时间')->value($position->updated_at);;

            $form->tools(function (Form\Tools $tools) {

                // 去掉返回按钮
                $tools->disableBackButton();

                // 去掉跳转列表按钮
                $tools->disableListButton();

                // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            });

            $form->setAction("/admin/position/{$id}/edit");
        });

        return Admin::content(function (Content $content) use($grid) {
            $content->description('编辑推荐位');
            $content->row($grid);
        });

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
