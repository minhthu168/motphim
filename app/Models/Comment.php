<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table ='tbcomment';//do table ko trung ten voi model
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_id','comment_content','comment_date','comment_like','comment_dislike','filtered','user_id','topic_id'];
    public $timestamps = false; //remove update_at, create_at in sql insert/update query

    public function topic(){
        return $this->belongsTo('App\Models\Topic','topic_id');
    }
    public function nguoidang(){
        return $this->belongsTo('App\Models\Nguoidang','user_id');
    }
    public function likes(){
        return $this->hasMany('App\Models\LikeDislike','comment_id')->sum('like');
    }
    public function dislikes(){
        return $this->hasMany('App\Models\LikeDislike','comment_id')->sum('dislike');
    }

}
