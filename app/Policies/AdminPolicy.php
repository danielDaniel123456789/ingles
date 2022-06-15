<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vervo;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

   public function errorPermisos(User $user){
return true;
   }
}
