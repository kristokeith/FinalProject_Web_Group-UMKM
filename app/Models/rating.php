<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table='rating';
    protected $primarykey='id';
    protected $fillable=['rating','user_id','id_product'];
    public function halaman()
    {
        return $this->belongsTo(halaman::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
