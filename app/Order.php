<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'cao_os';

    protected $primaryKey = 'co_os';

    public $incrementing = false;

    protected $keyType = 'string';
}
