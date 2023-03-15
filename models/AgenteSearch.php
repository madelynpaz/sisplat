<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agente;

/**
 * AgenteSearch represents the model behind the search form about `app\models\Agente`.
 */
class AgenteSearch extends Agente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agente', 'id_zona'], 'integer'],
            [['agente'], 'safe'],
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
        $query = Agente::find();

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
            'id_agente' => $this->id_agente,
            'id_zona' => $this->id_zona,
        ]);

        $query->andFilterWhere(['like', 'agente', $this->agente]);

        return $dataProvider;
    }
}
