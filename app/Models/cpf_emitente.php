<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpf_emitente extends Model
{
    protected $table = 'cpf_emitente';
    use HasFactory;
    protected $fillable = [
        'cpf_emitente',
        'fazenda_id',
    ];
}
