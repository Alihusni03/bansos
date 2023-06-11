<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function relawan()
    {
        return $this->HasMany(Relawan::class);
    }
}
