<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Operator extends Authenticatable
{

    use HasApiTokens;
    
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    protected $with = ['partner'];
    

    // Attributes hidden when the model is converted to JSON or array response
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
