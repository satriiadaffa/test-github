<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestSouvenir extends Model
{
    use HasFactory;

    protected $table = 'requestSouvenir';

    protected $fillable = [

        'namaBarang',
        'kodeGL',
        'kodeBarang',
        'debet',
        'saldo',
        'namaUnit',
        'nip',
        'namaUser',



    ];
}
