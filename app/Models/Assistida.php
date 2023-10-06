<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assistida extends Model
{
    use HasFactory;

    public function cidade()
    {
        return $this->belongsTo(Cidade::class,"cidades_id");
    }
    public function servico()
    {
        return $this->hasMany(Servico::class);
    }
}
