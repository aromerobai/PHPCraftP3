<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Acto
 * 
 * @property int $Id_acto
 * @property Carbon $Fecha
 * @property Carbon $Hora
 * @property string $Titulo
 * @property string $Descripcion_corta
 * @property string $Descripcion_larga
 * @property int $Num_asistentes
 * @property int $Id_tipo_acto
 * 
 * @property TipoActo $tipo_acto
 * @property Collection|Documentacion[] $documentacions
 * @property Collection|Inscrito[] $inscritos
 * @property Collection|ListaPonente[] $lista_ponentes
 *
 * @package App\Models
 */
class Acto extends Model
{
	protected $table = 'Actos';
	protected $primaryKey = 'Id_acto';
	public $timestamps = false;

	protected $casts = [
		'Fecha' => 'datetime',
		'Hora' => 'datetime',
		'Num_asistentes' => 'int',
		'Id_tipo_acto' => 'int'
	];

	protected $fillable = [
		'Fecha',
		'Hora',
		'Titulo',
		'Descripcion_corta',
		'Descripcion_larga',
		'Num_asistentes',
		'Id_tipo_acto'
	];

	public function tipo_acto()
	{
		return $this->belongsTo(TipoActo::class, 'Id_tipo_acto');
	}

	public function documentacions()
	{
		return $this->hasMany(Documentacion::class, 'Id_acto');
	}

	public function inscritos()
	{
		return $this->hasMany(Inscrito::class, 'id_acto');
	}

	public function lista_ponentes()
	{
		return $this->hasMany(ListaPonente::class, 'Id_acto');
	}
}
