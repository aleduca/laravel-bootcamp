<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$courses = Course::join('purchases', 'purchases.course_id', '=', 'courses.id')
		->where('purchases.user_id', Auth::id())
		->where('purchases.payment_status', 'paid')
		->paginate(2);
		// $courses = Course::whereHas('purchases', function ($query) {
		// 	$query->where('user_id', Auth::id())
		// 	->where('payment_status', 'paid');
		// })->paginate(2);

		return view('mycourses.index', [
			'courses' => $courses,
		]);
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
	public function store(Request $request)
	{
		//
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
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
