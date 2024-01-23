<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class recebi extends Model
{
    protected $table = 'recebi';
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'recebi',
        'cpf_recebido',
        'fazenda_id',
    ];
}
