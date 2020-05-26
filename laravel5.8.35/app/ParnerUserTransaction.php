<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParnerUserTransaction extends Model
{
    protected $table = 'parner_user_transactions';

    protected $fillable = [
        'user_id', 'parner_id', 'parner_user_id', 'exchange_type', 'exchange_point',
    ];
}
