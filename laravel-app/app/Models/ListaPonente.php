<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaPonente
 * 
 * @property int $id_ponente
 * @property int $Id_persona
 * @property int $Id_acto
 * @property int $Orden
 * 
 * @property Acto $acto
 * @property Persona $persona
 *
 * @package App\Models
 */
class ListaPonente extends Model
{
	protected $table = 'Lista_Ponentes';
	protected $primaryKey = 'id_ponente';
	public $timestamps = false;

	protected $casts = [
		'Id_persona' => 'int',
		'Id_acto' => 'int',
		'Orden' => 'int'
	];

	protected $fillable = [
		'Id_persona',
		'Id_acto',
		'Orden'
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
