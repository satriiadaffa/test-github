<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamTambahSaldoSouvenir extends Model
{
    use HasFactory;

    protected $table = 'rekamTambahSaldoSouvenir';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang',
        'debet'


    ];
}
