<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
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
