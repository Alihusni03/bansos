<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansos extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function donatur()
    {
        return $this->HasMany(Donatur::class);
    }
}
