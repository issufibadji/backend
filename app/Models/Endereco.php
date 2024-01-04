<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $primaryKey = "End_ID";
    protected $table = "enderecos";

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'USUA_ID_FK');
    }
}
