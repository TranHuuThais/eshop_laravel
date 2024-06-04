<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, User $targetUser)
    {
        return $user->role === 'admin' && $user->id !== $targetUser->id;
    }

    public function destroy(User $user, User $targetUser)
    {
        return $user->role === 'admin' && $user->id !== $targetUser->id;
    }

}