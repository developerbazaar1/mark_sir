<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usersites extends Model
{
    protected $table='usersites';
    protected $primaryKey='id';
    protected $fillable=['unique_id', 'site', 'sitetype', 'user_id', 'status', 'valid_days', 'start_date', 'end_date', 'preview_link', 'preview_link_count'];
    
    public function userdetails()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
