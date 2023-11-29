<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $Id_usuario
 * @property string $Username
 * @property string $Password
 * @property int $Id_Persona
 * @property int $Id_tipo_usuario
 * @property string|null $Email
 * 
 * @property Persona $persona
 * @property TiposUsuario $tipos_usuario
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'Usuarios';
	protected $primaryKey = 'Id_usuario';
	public $timestamps = false;

	protected $casts = [
		'Id_Persona' => 'int',
		'Id_tipo_usuario' => 'int'
	];

	protected $fillable = [
		'Username',
		'Password',
		'Id_Persona',
		'Id_tipo_usuario',
		'Email'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'Id_Persona');
	}

	public function tipos_usuario()
	{
		return $this->belongsTo(TiposUsuario::class, 'Id_tipo_usuario');
	}
}
