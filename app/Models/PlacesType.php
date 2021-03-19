<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class PlacesType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Place[] $places
 *
 * @package App\Models
 */
class PlacesType extends Model
{
    use HasTranslations;


	use SoftDeletes;


	protected $table = 'places_types';


	protected $fillable = [
		'name'
	];

    public $translatable = ['name'];

	public function places()
	{
		return $this->hasMany(Place::class, 'type_id');
	}
}
