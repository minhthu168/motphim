<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;
    protected $table ='tblikedislike';//do table ko trung ten voi model
    protected $primaryKey = 'id';
    protected $fillable = ['id','comment_id','like','dislike'];
    public $timestamps = false; //remove update_at, create_at in sql insert/update query

    
}
