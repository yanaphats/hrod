<?php

namespace User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'user_id',
		'prefix_id',
		'first_name',
		'last_name',
		'gender_id',
		'birthday',
		'phone',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'birthday' => 'datetime',
	];

	/**
	 * Get the user that owns the profile.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
