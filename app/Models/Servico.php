<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    public function assistida()
    {
        return $this->belongsTo(Assistida::class, 'assistida_id');
    }
}
