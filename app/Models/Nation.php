<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;
    protected $table='nation';
    protected $primaryKey = 'nation_id';
    protected $fillable = ['nation_name'];
    public $timestamps = false;
}