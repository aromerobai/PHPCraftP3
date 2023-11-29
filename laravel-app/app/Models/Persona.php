<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property int $Id_persona
 * @property string $Nombre
 * @property string $Apellido1
 * @property string $Apellido2
 * 
 * @property Collection|Documentacion[] $documentacions
 * @property Collection|Inscrito[] $inscritos
 * @property Collection|ListaPonente[] $lista_ponentes
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'Personas';
	protected $primaryKey = 'Id_persona';
	public $timestamps = false;

	protected $fillable = [
		'Nombre',
		'Apellido1',
		'Apellido2'
	];

	public function documentacions()
	{
		return $this->hasMany(Documentacion::class, 'Id_persona');
	}

	public function inscritos()
	{
		return $this->hasMany(Inscrito::class, 'Id_persona');
	}

	public function lista_ponentes()
	{
		return $this->hasMany(ListaPonente::class, 'Id_persona');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'Id_Persona');
	}
}
