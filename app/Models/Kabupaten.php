<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';

    protected $fillable = [
        'name',
        'provinsi_id'
    ];
    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
}
