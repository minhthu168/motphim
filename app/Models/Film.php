<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table='tbfilm';
    protected $primaryKey = 'film_id';
    protected $fillable = ['film_id','film_title','film_poster','film_cat','film_form','film_director','film_actor','film_actress','film_episode','film_runtime','film_release_year','film_nation','film_synopsis','film_trailer','user_id'];
    public $timestamps = false; 
    
    public function topic(){
        return $this->hasMany('App\Models\Topic','film_id');
    }
    function topicApproved(){
        return $this->topic()->where('topic_approved','=','1');
    }
}