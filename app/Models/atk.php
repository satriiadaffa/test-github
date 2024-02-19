<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atk extends Model
{
    use HasFactory;

    protected $table = 'atk';

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