<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    use HasFactory;
    protected $primaryKey = "PETI_ID";
    protected $table = "peticaos";

    protected $fillable = [
        'PETI_PROC',
        'PETI_TIPO_PROC',
        'PETI_ORG',
        'PETI_DESC_MEDI',
        'PETI_ESPE_MEDI',
        'PETI_SINT_INCA',
        'PETI_ATIV_EXER',
        'PETI_DESC_INDI',
        'PETI_VAL_INDI',
        'PETI_CIEN_ACAO',
        'PETI_REN_VAL',
        'PETI_RECE_EMAIL',
        'USUA_ID_FK',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'USUA_ID_FK');
    }
}
