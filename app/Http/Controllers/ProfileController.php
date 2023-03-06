<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function edit(Request $request)
    {
        return view('profiles.edit')->with([
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $user = $request->user();
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect()
            ->route('profile.edit')
            ->withSuccess('Profile edited.');

    }
}
