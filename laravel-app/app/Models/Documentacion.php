<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentacion
 * 
 * @property int $Id_presentacion
 * @property int $Id_acto
 * @property string $Localizacion_documentacion
 * @property int $Orden
 * @property int $Id_persona
 * @property string $Titulo_documento
 * 
 * @property Acto $acto
 * @property Persona $persona
 *
 * @package App\Models
 */
class Documentacion extends Model
{
	protected $table = 'Documentacion';
	protected $primaryKey = 'Id_presentacion';
	public $timestamps = false;

	protected $casts = [
		'Id_acto' => 'int',
		'Orden' => 'int',
		'Id_persona' => 'int'
	];

	protected $fillable = [
		'Id_acto',
		'Localizacion_documentacion',
		'Orden',
		'Id_persona',
		'Titulo_documento'
	];

	public function acto()
	{
		return $this->belongsTo(Acto::class, 'Id_acto');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'Id_persona');
	}
}
