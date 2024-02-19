<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamPendaftaranSouvenir extends Model
{
    use HasFactory;

    protected $table = 'rekamPendaftaranSouvenir';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang',
        'debet'


    ];
}
