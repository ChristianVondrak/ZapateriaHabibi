<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['description','status'];
     //Relacion Muchos a uno
     public function cliente(){
       return $this->belongsTo(Cliente::class);
    }
}
