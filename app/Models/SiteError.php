<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteError extends Model
{
    protected $table='site_error';
    protected $primaryKey='id';
    protected $fillable=['site_type', 'asset_type', 'device_type', 'max_width', 'max_height', 'width', 'height', 'dimentions', 'ratio', 'max_size', 'max_no','min_no', 'file_formate'];

}