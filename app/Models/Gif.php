<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    use HasFactory;

    protected $table = 'gifs';
    protected $fillable = ['gif_id','alias','user_id'];
}
