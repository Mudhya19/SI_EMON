<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function golongan()
    {
        return $this->hasOne(Golongan::class);
    }

    public function subkegiatan()
    {
        return $this->hasMany(Subkegiatan::class);
    }

}
