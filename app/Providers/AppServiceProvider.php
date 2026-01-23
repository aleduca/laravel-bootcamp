<?php

namespace App\Providers;

use App\Models\Course;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		Paginator::useTailwind();

		foreach (['update-profile', 'update-avatar', 'update-user', 'login', 'contact'] as $limiter) {
			RateLimiter::for($limiter, fn (Request $request) => Limit::perMinute(3)->by(
				$request->user()?->id ?: $request->ip()
			));
		}

		Route::bind('course_slug', fn (string $value) => Course::where('slug', $value)->firstOrFail());
	}
}
