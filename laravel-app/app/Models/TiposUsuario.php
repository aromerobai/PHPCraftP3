<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposUsuario
 * 
 * @property int $Id_tipo_usuario
 * @property string $Descripcion
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class TiposUsuario extends Model
{
	protected $table = 'Tipos_usuarios';
	protected $primaryKey = 'Id_tipo_usuario';
	public $timestamps = false;

	protected $fillable = [
		'Descripcion'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'Id_tipo_usuario');
	}
}
