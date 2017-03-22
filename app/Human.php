<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    protected $fillable = ['name', 'position', 'text', 'image'];
}
