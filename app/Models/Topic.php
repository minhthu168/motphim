<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table ='tbtopic';//do table ko trung ten voi model
    protected $primaryKey = 'topic_id';
    protected $fillable = ['topic_id','topic_title','topic_view','topic_poster','topic_content','topic_date','topic_approved','user_id','film_id'];
    public $timestamps = false; //remove update_at, create_at in sql insert/update query

    public function nguoidang(){
        return $this->belongsTo('App\Models\Nguoidang','user_id');
    }
    public function tenphim(){
        return $this->belongsTo('App\Models\Film','film_id');
    }
    public function binhluan(){
        return $this->hasMany('App\Models\Comment','topic_id');
    }
}
