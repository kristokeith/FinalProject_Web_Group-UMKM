<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table='kategori';
    protected $primarykey='id';
    protected $fillable=['name'];
    public function products()
    {
        return $this->hasMany(halaman::class);
    }
}
