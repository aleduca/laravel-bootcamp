<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function purchases(): HasMany
  {
    return $this->hasMany(Purchase::class);
  }

  public function profile(): HasOne
  {
    return $this->hasOne(Profile::class);
  }

  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class);
  }

  public function replies(): HasMany
  {
    return $this->hasMany(Reply::class);
  }

  public function getAvatarColorAttribute(): string
  {
    $colors = [
      'bg-indigo-600',
      'bg-blue-600',
      'bg-green-600',
      'bg-purple-600',
      'bg-pink-600',
      'bg-yellow-500',
      'bg-red-600',
      'bg-orange-500',
    ];
    // 8/8
    return $colors[$this->id % count($colors)];
  }

  public function getInitialsAttribute(): string
  {
    $first = mb_substr($this->firstName ?? '', 0, 1);
    $last = mb_substr($this->lastName ?? '', 0, 1);

    return strtoupper($first . $last);
  }

  public function getFullNameAttribute(): string
  {
    return $this->firstName . ' ' . $this->lastName;
  }
}
