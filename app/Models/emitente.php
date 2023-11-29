<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emitente extends Model
{
    protected $table = 'emitente';
    use HasFactory;
    protected $fillable = [
        'emitente',
        'fazenda_id',
    ];
}
