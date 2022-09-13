<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examResult extends Model
{
    protected $table = 'exam_result';
    protected $appends = ['body'];
    protected $guarded = ['id', 'body'];
}


