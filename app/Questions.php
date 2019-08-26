<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    /**
     * Return the question where `id` is equal to the parameter $id
     */
    public function scopeAvailableAnswers($query, $id) {
        return $query->where('id', $id);
    }
}
