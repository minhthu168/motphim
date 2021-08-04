<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $table='category';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name'];
    public $timestamps = false;
}