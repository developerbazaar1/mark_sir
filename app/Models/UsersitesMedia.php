<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersitesMedia extends Model
{
    protected $table='usersites_media';
    protected $primaryKey='id';
    protected $fillable=['usersite_id', 'file', 'sitetype', 'status', 'asset_type'];

}
