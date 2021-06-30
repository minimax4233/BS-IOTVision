<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function show(User $currentUser, User $user)
    {
        return ($currentUser->id === $user->id) || ($currentUser->is_admin == true);
    }

    public function update(User $currentUser, User $user)
    {
        return ($currentUser->id === $user->id) || ($currentUser->is_admin == true);
    }

    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    public function adminOnly(User $currentUser)
    {
        return $currentUser->is_admin;
    }

    public function destroyClient(Client $client, User $user)
    {
        return $client->user_id === $user->id;
    }

}
