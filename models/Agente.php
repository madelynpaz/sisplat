<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agente".
 *
 * @property integer $id_agente
 * @property string $agente
 * @property integer $id_zona
 *
 * @property Zona $idZona
 * @property Operacion[] $operacions
 */
class Agente extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'agente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['agente', 'id_zona'], 'required'],
			[['id_zona'], 'integer'],
			[['agente'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id_agente' => 'Id Agente',
			'agente' => 'Agente',
			'id_zona' => 'Zona',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdZona() {
		return $this->hasOne(Zona::className(), ['id_zona' => 'id_zona']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOperacions() {
		return $this->hasMany(Operacion::className(), ['id_agente' => 'id_agente']);
	}
}