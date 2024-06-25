<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
class GroupPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('manage-group') ? $this->allow() : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Group $group)
    {
        return $user->hasPermissionTo('view-group') ? $this->allow() : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create-group') ? $this->allow() : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Group $group)
    {
        return $user->hasPermissionTo('edit-group') ? $this->allow() : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Group $group)
    {
        return $user->hasPermissionTo('delete-group') ? $this->allow() : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Group $group)
    {
        //
    }
}
