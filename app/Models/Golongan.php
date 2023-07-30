<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kepegawaian()
    {
        return $this->belongsTo(Kepegawaian::class);
    }

}
