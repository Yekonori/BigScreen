<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    protected $fillable = [
        'question_id',
        'response',
        'hash_path'
    ];

    public function scopeQuestionID($query, $id) {

        // return responses where the question_id is equal to the $id
        return $query->where('question_id', $id);
    }

    public function scopeHashPath($query, $hashPath) {

        // return responses where the hash_path is equal to the $hashPath
        return $query->where('hash_path', $hashPath);
    }
}
