<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'cao_fatura';

    protected $primaryKey = 'co_fatura';

    public $incrementing = false;

    protected $keyType = 'string';
}
