<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function store(User $user)
    {
        auth()
            ->user()
            ->follow($user);

        return back();
    }

    public function delete(User $user)
    {
        auth()
            ->user()
            ->unFollow($user);

        return back();
    }
}
