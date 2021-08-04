<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table='ratefilm';
    protected $primaryKey = 'rate_id';
    protected $fillable = ['film_id','user_id','rate'];
    public $timestamps = false;
}