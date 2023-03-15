<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_operacion') ?>

    <?= $form->field($model, 'tipo_operacion') ?>

    <?= $form->field($model, 'id_agente') ?>

    <?= $form->field($model, 'id_modalidad') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'actual') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
