<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kodeGL extends Model
{
    use HasFactory;
    protected $table = 'kodeGL';

    protected $fillable = [

        'namaKode',
        'kode',
        'kodeGabungan',
        'kategori'


    ];
}
