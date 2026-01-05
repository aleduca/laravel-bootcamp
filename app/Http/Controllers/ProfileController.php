<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Services\AvatarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        //
    }

    public function avatar(Request $request, Profile $profile, AvatarService $avatarService)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $newName = $avatarService->upload(
            $request->file('avatar'),
            $profile->avatar,
            300
        );

        $profile->avatar = $newName;
        $profile->save();

        return back()->with('success-avatar', 'Avatar uploaded successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        $validated = $request->validated();
        Profile::create([
            'user_id' => Auth::id(),
            ...$validated,
        ]);

        return back()->with('success-profile', 'Profile created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        $isUpdate = false;
        if ($profile) {
            $isUpdate = true;
            $this->authorize('update', $profile);
        }

        return view('profile.edit', compact('profile', 'isUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $validated = $request->validated();

        $profile->update($validated);

        return back()->with('success-profile', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
