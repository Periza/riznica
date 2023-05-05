<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Operator extends Authenticatable
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function getAuthIdentifierName() 
    {
        return 'sifra';
    }

    public function getAuthIdentifier()
    {
        return $this->sifra;
    }

}
