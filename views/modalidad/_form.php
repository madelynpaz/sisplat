<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modalidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modalidad-form">
	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'modalidad')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
