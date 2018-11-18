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
}
