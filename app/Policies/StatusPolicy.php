<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    //只有微博作者是当前登陆用户时，才有权删除
    public function destroy(User $user,Status $status)
    {
        return $user->id === $status->user->id;
    }
}
