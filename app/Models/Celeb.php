<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celeb extends Model
{
    use HasFactory;
    protected $table='celeb';
    protected $primaryKey = 'celeb_id';
    protected $fillable = ['celeb_id','celeb_type','celeb_name','celeb_yob','celeb_image','profile'];
    public $timestamps = false; 
}
?>