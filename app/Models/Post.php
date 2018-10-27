<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function getAllDogPosts($name = null, $begin_date = null,$end_date = null)
    {
        $posts = Post::query();
        if($name != null || $begin_date != null) {
            $posts = Post::where('name','like', "%$name%");
        }
        if($begin_date != null){
            $posts = Post::whereDate('created_at',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $posts = Post::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $posts;
    }
}
