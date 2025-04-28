<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    use HasFactory;

    protected $table = 'musteriler';

    protected $fillable = [
        'ad',
        'musteri_unvan',
        'tipi',
        'adres',
        'ilgili_kisi',
        'ilgili_kisi_email',
    ];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class, 'musteri_id');
    }
}