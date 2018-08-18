<?php
/**
 * Created by PhpStorm.
 * User: yyasui
 * Date: 2018/08/07
 * Time: 23:20
 */

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Comments(){
        return $this->hasMany(Comment::Class, 'post_id');
    }

    public function Category(){
        return $this->belongsTo(Category::Class, 'cat_id');
    }
}
