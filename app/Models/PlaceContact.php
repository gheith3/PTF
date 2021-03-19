<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlaceContact
 * 
 * @property int $id
 * @property int $place_id
 * @property int|null $user_id
 * @property string $type
 * @property string $contact
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Place $place
 * @property User|null $user
 *
 * @package App\Models
 */
class PlaceContact extends Model
{
	use SoftDeletes;
	protected $table = 'place_contact';

	protected $casts = [
		'place_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'place_id',
		'user_id',
		'type',
		'contact'
	];

	public function place()
	{
		return $this->belongsTo(Place::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
