<?php

/**
 * 公用的方法  
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}

/**
 * 构建树形结构
 * @param $data 数据
 * @param $pid 父类id
 * @return array  返回数据
 */
function buildTree($data, $pid = 0) 
{
    $all = array();
    foreach ($data as $key => $item) {
        if ($item['pid'] == $pid) {
            $children =  buildTree($data, $item['id']);
            if (!empty($children)) {
                $item['children'] = $children;
            }
            $all[] = $item;
        }
    }

    return $all;
}
