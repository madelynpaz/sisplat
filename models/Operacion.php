<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id_operacion
 * @property integer $id_agente
 * @property integer $id_modalidad_compra
 * @property double $precio_compra
 * @property integer $id_modalidad_venta
 * @property double $precio_venta
 * @property string $fecha
 * @property integer $actual
 *
 * @property Agente $idAgente
 * @property Modalidad $idModalidadCompra
 * @property Modalidad $idModalidadVenta
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agente', 'id_modalidad_venta', 'precio_venta', 'fecha'], 'required'],
            [['id_agente', 'id_modalidad_compra', 'id_modalidad_venta', 'actual'], 'integer'],
            [['precio_compra', 'precio_venta'], 'number'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_operacion' => 'Id Operacion',
            'id_agente' => 'Agente',
            'id_modalidad_compra' => 'Modalidad Compra',
            'precio_compra' => 'Precio Compra',
            'id_modalidad_venta' => 'Modalidad Venta',
            'precio_venta' => 'Precio Venta',
            'fecha' => 'Fecha',
            'actual' => 'Actual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgente()
    {
        return $this->hasOne(Agente::className(), ['id_agente' => 'id_agente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModalidadCompra()
    {
        return $this->hasOne(Modalidad::className(), ['id_modalidad' => 'id_modalidad_compra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModalidadVenta()
    {
        return $this->hasOne(Modalidad::className(), ['id_modalidad' => 'id_modalidad_venta']);
    }
}
