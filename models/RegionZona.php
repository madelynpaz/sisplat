<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region_zona".
 *
 * @property integer $id_region_zona
 * @property integer $id_region
 * @property integer $id_zona
 *
 * @property Region $idRegion
 * @property Zona $idZona
 */
class RegionZona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region_zona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_region', 'id_zona'], 'required'],
            [['id_region', 'id_zona'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_region_zona' => 'Id Region Zona',
            'id_region' => 'Id Region',
            'id_zona' => 'Id Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRegion()
    {
        return $this->hasOne(Region::className(), ['id_region' => 'id_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdZona()
    {
        return $this->hasOne(Zona::className(), ['id_zona' => 'id_zona']);
    }
}
