<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referente extends Model
{
    protected $table = 'referente';
    use HasFactory;
    protected $fillable = [
        'referente',
        'fazenda_id',
    ];
}
