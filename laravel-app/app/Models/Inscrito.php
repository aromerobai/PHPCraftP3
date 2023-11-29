<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscrito
 * 
 * @property int $Id_inscripcion
 * @property int $Id_persona
 * @property int $id_acto
 * @property Carbon $Fecha_inscripcion
 * 
 * @property Acto $acto
 * @property Persona $persona
 *
 * @package App\Models
 */
class Inscrito extends Model
{
	protected $table = 'Inscritos';
	protected $primaryKey = 'Id_inscripcion';
	public $timestamps = false;

	protected $casts = [
		'Id_persona' => 'int',
		'id_acto' => 'int',
		'Fecha_inscripcion' => 'datetime'
	];

	protected $fillable = [
		'Id_persona',
		'id_acto',
		'Fecha_inscripcion'
	];

	public function acto()
	{
		return $this->belongsTo(Acto::class, 'id_acto');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'Id_persona');
	}
}
