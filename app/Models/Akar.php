<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akar extends Model
{
    use HasFactory;
    protected $table ='akar';
    
    protected $fillable = ['input', 'hasil', 'waktu','jenis'];
}
