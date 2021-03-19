<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Place
 *
 * @property int $id
 * @property int $type_id
 * @property int|null $user_id
 * @property string $name
 * @property string $latitude
 * @property string $longitude
 * @property string $details
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property PlacesType $places_type
 * @property User|null $user
 * @property Collection|PlaceContact[] $place_contacts
 *
 * @package App\Models
 */
class Place extends Model
{

	use SoftDeletes;
	protected $table = 'places';



	protected $casts = [
		'type_id' => 'int',
		'user_id' => 'int',
        'details' => 'array'
	];

	protected $fillable = [
		'type_id',
		'user_id',
		'name',
		'latitude',
		'longitude',
		'details'
	];

	public function type()
	{
		return $this->belongsTo(PlacesType::class, 'type_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function contacts()
	{
		return $this->hasMany(PlaceContact::class);
	}
}
