<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamTambahSaldoAtk extends Model
{
    use HasFactory;

    protected $table = 'rekamTambahSaldoAtk';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang',
        'debet'


    ];
}
