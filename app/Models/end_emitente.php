<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class end_emitente extends Model
{
    protected $table = 'end_emitente';
    use HasFactory;
    protected $fillable = [
        'end_emitente',
        'fazenda_id',
    ];
}
