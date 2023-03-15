<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modalidad".
 *
 * @property integer $id_modalidad
 * @property string $modalidad
 *
 * @property Operacion[] $operacions
 */
class Modalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modalidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modalidad'], 'required'],
            [['modalidad'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_modalidad' => 'Id Modalidad',
            'modalidad' => 'Modalidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['id_modalidad' => 'id_modalidad']);
    }
}
