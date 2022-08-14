<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movimentaco
 * 
 * @property int $id
 * @property string $tipo
 * @property string $data
 * @property float $valor
 * @property string $cpf
 * @property string $cartao
 * @property string $hora
 * @property int $loja_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loja $loja
 *
 * @package App\Models
 */
class Movimentacao extends Model
{
	protected $table = 'movimentacoes';

	protected $casts = [
		'valor' => 'float',
		'loja_id' => 'int'
	];

	protected $fillable = [
		'tipo',
		'data',
		'valor',
		'cpf',
		'cartao',
		'hora',
		'loja_id'
	];

	public function loja()
	{
		return $this->belongsTo(Loja::class);
	}

	public function getTipoAttribute($value)
	{
		$desc_tipo = ["","Débito","Boleto","Financiamento","Crédito",
						"Recebimento Empréstimo","Vendas","Recebimento TED",
						"Recebimento DOC","Aluguel"];

			return $desc_tipo[$value];
	}

	public function getDataAttribute($value)
	{					
			return substr($value, 6,2) . '/' . substr($value, 4,2) . '/' .substr($value, 0,4);
	}

	public function getValorAttribute($value)
	{					
			return $value/100.00;
	}

	public function getCpfAttribute($value)
	{					
		return substr($value, 0,3) . '.' . substr($value, 3,3). '.' . substr($value, 6,3). '-' . substr($value, 9,2);
	}

	public function getHoraAttribute($value)
	{					
		return substr($value, 0,2) . ':' . substr($value, 2,2). ':' . substr($value, 4,2);
	}
}
