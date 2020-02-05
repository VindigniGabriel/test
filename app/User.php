<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'cao_usuario';

    protected $primaryKey = 'co_usuario';

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $visible = ['co_usuario','no_usuario'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /* protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */

    public function permission()
    {
        return $this->hasOne('App\Permission', 'co_usuario');
    }
    
    public function invoices()
    {
        return $this->hasManyThrough(
            'App\Invoice', 
            'App\Order',
            'co_usuario',
            'co_os',
        );
    }

    public function salary()
    {
        return $this->hasOne('App\Salary', 'co_usuario');
    }
    
}
