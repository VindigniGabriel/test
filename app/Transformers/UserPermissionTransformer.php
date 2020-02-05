<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserPermissionTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->co_usuario,
            'value' => $user->no_usuario,
            'label' => $user->no_usuario,
        ];
    }
}
