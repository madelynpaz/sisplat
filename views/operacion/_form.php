<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Agente;
use app\models\Modalidad;
use app\models\Zona;
use yii\helpers\Url;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */
/* @var $form yii\widgets\ActiveForm */

$listZona=ArrayHelper::map(Zona::find()->asArray()->all(),'id_zona','zona');
$listModalidades = ArrayHelper::map(Modalidad::find()->asArray()->all(), 'id_modalidad', 'modalidad');

if(!$model->isNewRecord){
	$agentes = ArrayHelper::map(Agente::find()->where(['id_agente'=>$model->id_agente])->asArray()->all(), 'id_agente', 'agente');
} else {
	$agentes = [];
}
?>

<div class="operacion-form">
    <?php $form = ActiveForm::begin(); ?>

	<?php echo $form->field($zona, 'id_zona')->dropDownList($listZona, ['prompt'=>'Seleccione',
		'onchange'=>'$.get("'.Url::toRoute('agente/listporzona').'", { id: $(this).val()}).done(function(data){
			$("select#operacion-id_agente").html(data);
		});'
		]) ?>
	
	<?php echo $form->field($model, 'id_agente')->dropDownList($agentes, ['prompt'=>'Seleccione']) ?>

    <?= $form->field($model, 'id_modalidad_compra')->dropDownList($listModalidades, ['prompt'=>'Seleccione']) ?>

	<?= $form->field($model, 'precio_compra')->textInput() ?>
	
	<?= $form->field($model, 'id_modalidad_venta')->dropDownList($listModalidades, ['prompt'=>'Seleccione']) ?>

	<?= $form->field($model, 'precio_venta')->textInput() ?>
	
    <?= $form->field($model,'fecha')->widget(DatePicker::className(), [
		'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control']]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>