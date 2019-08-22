<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function scopeAvailableAnswers($query, $id) {

        // return responses where the question_id is equal to the $id
        return $query->where('id', $id);
    }
}
