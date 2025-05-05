<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teklif extends Model
{
    use HasFactory;

    protected $table = 'teklifler';

    protected $fillable = [
        'teklif_no',
        'is_id',
        'aciklama',
        'tutar',
        'alis_tutar',
    ];

    public function isModel()
    {
        return $this->belongsTo(Is::class, 'is_id');
    }
}