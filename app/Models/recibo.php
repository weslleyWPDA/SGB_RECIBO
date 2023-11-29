<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recibo extends Model
{
    protected $table = 'recibos';
    use HasFactory;
    protected $fillable = [
        'id',
        'recebi',
        'endereco',
        'valor',
        'referente',
        'cidade',
        'emitente',
        'user_id',
        'data',
        'cpf_emitente',
        'end_emitente',
        'fazenda_id',
        'delete',
        'rg',
        'cpf_recebido'
    ];
    // referencia user id
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function fazenda()
    {
        return $this->hasOne(Fazenda::class, 'id', 'fazenda_id');
    }
}
