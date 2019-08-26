<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    /**
     * The attributes that are mass assignable : 
     *  - `question_id`
     *  - `response`
     *  - `hash_path`
     */
    protected $fillable = [
        'question_id',
        'response',
        'hash_path'
    ];

    /**
     * Return response(s) where `question_id` is equal to the parameter $id
     */
    public function scopeQuestionID($query, $id) {

        return $query->where('question_id', $id);
    }

    /**
     * Return response(s) where `hash_path` is equal to the parameter $hashPath
     */
    public function scopeHashPath($query, $hashPath) {

        return $query->where('hash_path', $hashPath);
    }
}
