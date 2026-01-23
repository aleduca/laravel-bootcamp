<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$courses = Course::paginate(5);

		return view('courses.index', [
			'title' => 'Courses',
			'courses' => $courses,
		]);
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
	public function store(Request $request): void
	{
		//
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
	public function edit(string $id): void
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id): void
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id): void
	{
		//
	}
}
