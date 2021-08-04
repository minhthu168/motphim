<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoidang extends Model
{
    use HasFactory;

    protected $table ='tbuser';//do table ko trung ten voi model
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id','user_role','username','user_pass','user_email','user_gender','user_yob'];
    public $timestamps = false; //remove update_at, create_at in sql insert/update query

    public function binhluan(){
        return $this->hasMany('App\Models\Comment','user_id');
    }
}

