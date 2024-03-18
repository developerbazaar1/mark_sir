<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitetypes extends Model
{
    protected $table='sitetypes';
    protected $primaryKey='id';
    protected $fillable=['name'];
}
