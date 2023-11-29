<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpf_recebido extends Model
{

    protected $table = 'cpf_recebido';
    use HasFactory;
    protected $fillable = [
        'cpf_recebido',
        'fazenda_id',
    ];
}
