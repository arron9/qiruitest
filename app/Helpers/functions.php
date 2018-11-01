<?php 

function buildTree($items, $pid = 0) {
    $data = array();
    foreach($items as $item) {
        if ($item['pid'] == $pid) {
            $children = buildTree($items, $item['id']);
            if (!empty($children)) {
                $item['children'] = $children;
            }

            $data[] = $item;
        }
    }

    return $data;
}
