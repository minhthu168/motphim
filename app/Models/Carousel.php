<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $table='carousel';
    protected $primaryKey = 'carousel_id';
    protected $fillable = ['carousel_name','carousel_image'];
    public $timestamps = false;
}