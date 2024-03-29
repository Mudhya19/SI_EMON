<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function realisasi()
    {
        return $this->hasMany(Realisasi::class);
    }

    public function subkegiatan(){
        return $this->hasMany(Subkegiatan::class);
    }
}
