<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id_region
 * @property string $region
 *
 * @property RegionZona[] $regionZonas
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region'], 'required'],
            [['region'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_region' => 'Id Region',
            'region' => 'Region',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionZonas()
    {
        return $this->hasMany(RegionZona::className(), ['id_region' => 'id_region']);
    }
}
