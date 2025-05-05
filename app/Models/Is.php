<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Is extends Model
{
    use HasFactory;

    protected $table = 'isler'; // <<< BU SATIRI EKLEMEK GEREKİYOR!

    protected $fillable = [
        'is_no',
        'musteri_id',
        'musteri_referans_no',
        'kayit_tarihi',
        'user_id',
    ];

    public function musteri()
    {
        return $this->belongsTo(Musteri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teklifler()
    {
        return $this->hasMany(Teklif::class, 'is_id');
    }

    public function teknikdata()
    {
        return $this->hasMany(TeknikData::class, 'is_id');
    }
}