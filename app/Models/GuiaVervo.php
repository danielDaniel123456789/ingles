<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaVervo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id','id_ultimaPalabra','id_proximaPalabra'];
}
