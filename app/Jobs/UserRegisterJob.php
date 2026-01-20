<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Notifications\VerifyEmailNotification;

class UserRegisterJob implements ShouldQueue
{
	use Queueable;

	public $tries = 3;


	public $backoff = [5, 6, 7];

	/**
	 * Create a new job instance.
	 */
	public function __construct(public User $user)
	{
		//
	}

	/**
	 * Execute the job.
	 */
	public function handle(): void
	{
		// event(new Registered($this->user));
		$this->user->notify(new VerifyEmailNotification);
	}
}
