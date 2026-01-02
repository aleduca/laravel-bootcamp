<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
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
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit()
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
	public function destroy(string $id)
	{
		//
	}
}
