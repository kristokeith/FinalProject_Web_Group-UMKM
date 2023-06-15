<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class halaman extends Model
{
    use HasFactory;
    protected $primarykey="id";
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class,'category_id');
    }
    public function ratings()
    {
        return $this->hasMany(rating::class);
    }
    protected $table="halaman";
    protected $fillable=['judul','deskripsi','foto','category_id'];
}