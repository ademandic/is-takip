<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeknikData extends Model
{
    use HasFactory;

    protected $table = 'teknik_data';

    protected $fillable = [
        'is_id',
        'sistem_tipi',
        'sogutma_burcu',
        'nozzle_adedi',
        'kalip_goz_adedi',
        'giris_capi',
        'sr_alani',
        'parca_gramaji',
        'parca_et_kalinligi',
        'malzeme_bilgisi',
        'parca_gorselligi',
    ];

    public function isModel()
    {
        return $this->belongsTo(Is::class, 'is_id');
    }
}