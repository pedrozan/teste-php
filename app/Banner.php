<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['name', 'imagePath'];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';
}
