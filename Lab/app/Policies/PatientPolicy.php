<?php

namespace App\Policies;

use App\Models\User;

use App\Models\UserRight;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    const MODEL_NAME = 'patient';

    private function checkRight(User $user, String $right) {
    
        return UserRight::where('user_id', $user->id)
        ->where("right", $right)
        ->where('model', self::MODEL_NAME)
        ->exists();
    }

    public function update(User $user) {
        return $this->checkRight($user, 'update');
    }

    
    public function view(User $user) {
        return $this->checkRight($user, 'view');
    }

}
