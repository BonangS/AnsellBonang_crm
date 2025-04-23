<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = ['nama', 'email', 'telepon', 'status', 'manager_approved'];
    
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
