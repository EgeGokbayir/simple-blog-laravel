<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    protected $table = "articles";
    use SoftDeletes;

    function getCategory(){

        return $this->hasOne('App\Models\Category','id','category_id');
        
    }
}
