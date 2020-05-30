<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'parner_name',
        'name',
        'bonus_point',
        'image1',
        'image2',
        'image3',
        'price',
        'quantity',
        'description',
        'expired',
    ];

    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user_transactions');
    }

    public function parner()
    {
        return $this->belongsTo(Parner::class);
    }
}
