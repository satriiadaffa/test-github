<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamPenghapusanSouvenir extends Model
{
    use HasFactory;

    protected $table = 'rekamPenghapusanSouvenir';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang'


    ];
}
