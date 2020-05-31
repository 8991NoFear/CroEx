<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollaborateRequest extends Model
{
    protected $table = 'parners';

    protected $fillable = [
        'name', 'avatar', 'email'
    ];
}
