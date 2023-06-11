<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    use HasFactory;
    
    protected $guarded = ['id']; 
    
    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jenis_kelamin()
    {
        return $this->belongsTo(Jenis_kelamin::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
