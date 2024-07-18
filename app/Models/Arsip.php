<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = "arsip";
    protected $primaryKey = 'id_arsip';
    protected $fillable = ['nomor_surat', 'judul', 'file_pdf'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
