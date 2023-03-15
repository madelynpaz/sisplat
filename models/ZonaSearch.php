<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zona;

/**
 * ZonaSearch represents the model behind the search form about `app\models\Zona`.
 */
class ZonaSearch extends Zona {

//	public $pesada;
//	public $cesta;
//	public $bolsa5;
//	public $bolsa10;
//	public $unidad;
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id_zona'], 'integer'],
			[['zona'], 'safe'],
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
		$query = Zona::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => array('pageSize' => 10),
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id_zona' => $this->id_zona,
		]);

		$query->andFilterWhere(['like', 'zona', $this->zona]);
		return $dataProvider;
	}
}