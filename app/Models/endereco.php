<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    protected $table = 'endereco';
    use HasFactory;
    protected $fillable = [
        'endereco',
        'fazenda_id',
    ];
}
