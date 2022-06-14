<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voz extends Model
{
    use HasFactory;
       
    public $timestamps = false;
    protected $fillable = ['id','velocidad','user_id'];
}
