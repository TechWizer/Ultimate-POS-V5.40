<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    // use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['image_url'];
}
