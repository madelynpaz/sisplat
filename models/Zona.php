<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zona".
 *
 * @property integer $id_zona
 * @property string $zona
 *
 * @property Agente[] $agentes
 * @property RegionZona[] $regionZonas
 */
class Zona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona'], 'required'],
            [['zona'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_zona' => 'ID Zona',
            'zona' => 'Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgentes()
    {
        return $this->hasMany(Agente::className(), ['id_zona' => 'id_zona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionZonas()
    {
        return $this->hasMany(RegionZona::className(), ['id_zona' => 'id_zona']);
    }
}
