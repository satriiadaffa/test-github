<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestAtk extends Model
{
    use HasFactory;

    protected $table = 'requestAtk';

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
