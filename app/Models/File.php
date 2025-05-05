<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_id',
        'dosya_adi',
        'dosya_yolu',
    ];

    public function isler()
    {
        return $this->belongsTo(Is::class, 'is_id');
    }
}