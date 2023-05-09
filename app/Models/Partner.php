<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;
    
    use HasFactory;

    protected $guarded = [];

    public function operators()
    {
        return $this->hasMany(Operator::class);
    }
}
