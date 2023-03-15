<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Zona;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Agente */
/* @var $form yii\widgets\ActiveForm */

$zonas = Zona::find()->all();
$listData=ArrayHelper::map($zonas,'id_zona','zona');
?>

<div class="agente-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'agente')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'id_zona')->dropDownList($listData, ['prompt'=>'Seleccione']); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>