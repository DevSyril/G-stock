<?php

namespace App\Repositories;
use App\Interfaces\AuthenticationInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticationRepository implements AuthenticationInterface
{
    public function login($data) {
        return Auth::attempt($data);

    }

    public function registration($data) {
        return User::create($data);
    }
}
