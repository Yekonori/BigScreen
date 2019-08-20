<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'question_id',
        'response',
        'hash_path'
    ];
}
