<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name', 'type', 'fur', 'feathers', 'scale', 'color'];
}
