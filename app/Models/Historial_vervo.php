<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_vervo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_user','id_vervo','id_historial'];
}
