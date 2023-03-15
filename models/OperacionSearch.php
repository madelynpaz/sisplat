<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operacion;

/**
 * OperacionSearch represents the model behind the search form about `app\models\Operacion`.
 */
class OperacionSearch extends Operacion {

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id_operacion', 'id_agente', 'id_modalidad_compra', 'id_modalidad_venta', 'actual'], 'integer'],
//			[['fecha'], 'safe'],
			[['precio_compra','precio_venta'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Operacion::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id_operacion' => $this->id_operacion,
			'id_agente' => $this->id_agente,
			'id_modalidad_compra' => $this->id_modalidad_compra,
			'precio_compra' => $this->precio_compra,
			'id_modalidad_venta' => $this->id_modalidad_venta,
			'precio_venta' => $this->precio_venta,
			'fecha' => $this->fecha,
			'actual' => $this->actual,
		]);

		return $dataProvider;
	}
}