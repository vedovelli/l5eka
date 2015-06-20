<?php namespace App\Dave\Repositories;

use App\Dave\Models\User as User;

class UserRepository implements IUserRepository
{
    public function show($id)
    {
        return User::with(['owns', 'isMemberOf'])->find($id);
    }
}