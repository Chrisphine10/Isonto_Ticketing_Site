<?php

namespace App\Policies;

use App\Church;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChurchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any churches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the church.
     *
     * @param  \App\User  $user
     * @param  \App\Church  $church
     * @return mixed
     */
    public function view(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can create churches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role, [
            'church'
        ]);
    }

    /**
     * Determine whether the user can update the church.
     *
     * @param  \App\User  $user
     * @param  \App\Church  $church
     * @return mixed
     */
    public function update(User $user, Church $church)
    {
       //
    }

    /**
     * Determine whether the user can delete the church.
     *
     * @param  \App\User  $user
     * @param  \App\Church  $church
     * @return mixed
     */
    public function delete(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can restore the church.
     *
     * @param  \App\User  $user
     * @param  \App\Church  $church
     * @return mixed
     */
    public function restore(User $user, Church $church)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the church.
     *
     * @param  \App\User  $user
     * @param  \App\Church  $church
     * @return mixed
     */
    public function forceDelete(User $user, Church $church)
    {
        //
    }
}
