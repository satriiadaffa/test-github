<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class souvenir extends Model
{
    use HasFactory;

    protected $table = 'souvenir';

    protected $fillable = [

        'namaBarang',
        'kodeGL',
        'kodeBarang',
        'debet',
        'saldo',
        'status',
        'satuanBarang',
        'hargaSatuan'


    ];
}
