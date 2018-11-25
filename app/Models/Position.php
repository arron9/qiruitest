<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    public static function getPositions()
    {
        $items = [];
        $categories = Position::all();
        foreach($categories as $category) {
            $items[$category->id] = $category->name;
        }

        return $items;
    }

    public function getPositionByKey($key) {
        return Position::where("key", $key)->first();
    }

    public function getPositionsByPid($pid) {
        $items = Position::where("pid", $pid)->get();
        $data = [];
        if ($items) {
            foreach($items as $item) {
                $data[$item->id] = $item;
            }
        }

        return $data;
    }

}
