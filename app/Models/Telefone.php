<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Telefone extends Model
{
    use HasFactory;
    protected $primaryKey = "USUA_CD_TELEFONE_ID";
    protected $table = "Usua_cd_telefones";

    protected $fillable = [
        'USUA_CD_TELEFONE',
        'USUA_ID_FK',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'USUA_ID_FK');
    }
}
