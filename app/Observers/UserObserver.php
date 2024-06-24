<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\SystemNotifications;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    public $admin;

    public function __construct()
    {
        $this->admin = User::whereHas('roles', function ($query) {
            $query->where('name', 'Admin');
        })->get();
    }

    public function created(User $user)
    {
        $NewUser = [
            'name' => $user->name,
            'type' => 'Registered',
            'message' => 'New User Registered',
            'icon' => 'user',
            'color' => 'info',
        ];
        Notification::send($this->admin , new SystemNotifications($NewUser));
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
