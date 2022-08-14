<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dono
 * 
 * @property int $id
 * @property string $nome
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Loja[] $lojas
 *
 * @package App\Models
 */
class Dono extends Model
{
	protected $table = 'donos';

	protected $fillable = [
		'nome'
	];

	public function lojas()
	{
		return $this->hasMany(Loja::class);
	}
}
