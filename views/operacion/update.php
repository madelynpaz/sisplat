<?php

use yii\helpers\Html;
use app\models\Zona;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$this->title = 'Actualizar Datos: ' . ' ' . $model->idAgente->agente;
$this->params['breadcrumbs'][] = ['label' => 'Datos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAgente->agente, 'url' => ['view', 'id' => $model->id_operacion]];
$this->params['breadcrumbs'][] = 'Actualizar';

$zona = Zona::findOne($model->idAgente->idZona->id_zona);
?>
<div class="operacion-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'zona'=>$zona,
    ]) ?>
</div>