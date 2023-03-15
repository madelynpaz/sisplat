<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historial_zona".
 *
 * @property integer $id_historial_zona
 * @property integer $id_zona
 * @property string $fecha
 * @property double $pesada
 * @property double $cesta
 * @property double $bolsa5
 * @property double $bolsa10
 * @property double $unidad
 * @property string $radio
 * @property integer $actual
 *
 * @property Zona $idZona
 */
class HistorialZona extends \yii\db\ActiveRecord {

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'historial_zona';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id_zona', 'fecha', 'pesada', 'cesta', 'bolsa5', 'bolsa10', 'unidad', 'radio'], 'required'],
			[['id_zona', 'actual'], 'integer'],
			[['fecha'], 'safe'],
			[['pesada', 'cesta', 'bolsa5', 'bolsa10', 'unidad'], 'number'],
			[['radio'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id_historial_zona' => 'Id Historial Zona',
			'id_zona' => 'Id Zona',
			'fecha' => 'Fecha',
			'pesada' => 'Pesada',
			'cesta' => 'Cesta',
			'bolsa5' => 'Bolsa5',
			'bolsa10' => 'Bolsa10',
			'unidad' => 'Unidad',
			'radio' => 'Radio',
			'actual' => 'Actual',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdZona() {
		return $this->hasOne(Zona::className(), ['id_zona' => 'id_zona']);
	}
}