<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoActo
 * 
 * @property int $Id_tipo_acto
 * @property string $Descripcion
 * 
 * @property Collection|Acto[] $actos
 *
 * @package App\Models
 */
class TipoActo extends Model
{
	protected $table = 'Tipo_acto';
	protected $primaryKey = 'Id_tipo_acto';
	public $timestamps = false;

	protected $fillable = [
		'Descripcion'
	];

	public function actos()
	{
		return $this->hasMany(Acto::class, 'Id_tipo_acto');
	}
}
