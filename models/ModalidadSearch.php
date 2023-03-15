<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Modalidad;

/**
 * ModalidadSearch represents the model behind the search form about `app\models\Modalidad`.
 */
class ModalidadSearch extends Modalidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_modalidad'], 'integer'],
            [['modalidad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Modalidad::find();

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
            'id_modalidad' => $this->id_modalidad,
        ]);

        $query->andFilterWhere(['like', 'modalidad', $this->modalidad]);

        return $dataProvider;
    }
}
