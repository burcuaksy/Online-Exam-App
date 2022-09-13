<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examList extends Model
{
    protected $table = 'exam_list';
    protected $appends = ['body'];
    protected $guarded = ['id', 'body'];

}
