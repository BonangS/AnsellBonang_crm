<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $fillable = ['nama', 'email', 'telepon','layanan_id','status'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
