<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function show(User $user)
    {
        return view("profile.show", [
            "user" => $user,
            "tweets" => $user->tweets()
                ->withLikes()
                ->paginate(10)
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user);

        return view("profile.edit", compact("user"));
    }

    public function update(User $user)
    {
        $this->authorize("update", $user);

        $valid = request()->validate([
            "banner" => [
                "file"
            ],
            "avatar" => [
                "file"
            ],
            "name" => [
                "required",
                "string",
                "max:255"
            ],
            "description" => [
                "string",
                "max:300"
            ],
            "username" => [
                "required",
                "string",
                "max:255",
                "alpha_dash",
                Rule::unique("users")->ignore($user)
            ],
            "email" => [
                "required",
                "string",
                "email",
                Rule::unique("users")->ignore($user)
            ],
        ]);

        if (request("avatar")) {
            $valid["avatar"] = request("avatar")->store("avatars");
            $img = Image::make(public_path("storage/" . $valid["avatar"]))->resize(150, 150);
            $img->save();
        }

        if (request("banner")) {
            $valid["banner"] = request("banner")->store("banners");
            $img = Image::make(public_path("storage/" . $valid["banner"]))->resize(750, 244);
            $img->save();
        }

        $user->update($valid);

        return redirect()->route("profile.show", $user->username);
    }
}
