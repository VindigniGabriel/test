<?php

namespace App\Http\Controllers;

use App\Transformers\UserPermissionTransformer;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function __invoke()
    {
        $consultans = User::whereHas('permission', function (Builder $query) {
            $query->where('in_ativo', 'S')
            ->whereIn('co_tipo_usuario', [0, 1, 2]);
        })->get();

        $result = fractal($consultans, new UserPermissionTransformer())->respond();

        return $result;

    }
    
}
