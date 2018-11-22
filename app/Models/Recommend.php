<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recommend';

    public function getRecommendsByPositionId($positionId)
    {
        return Recommend::where("position_id", $positionId)->get();
    }

    public function getRecommendsByPositionIds($positionIds)
    {
        if (!is_array($positionIds)) {
            $positionIds = array($positionIds);
        }

        return Recommend::whereIn("position_id", $positionIds)->get();
    }
}
