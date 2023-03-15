<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$this->title = $model->idAgente->idZona->zona.' - '.$model->idAgente->agente;
$this->params['breadcrumbs'][] = ['label' => 'Datos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_operacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_operacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma que desea borrar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			'idAgente.idZona.zona',
			'idAgente.agente',
			[
				'label'=>'Modalidad Compra',
				'value'=>$model->idModalidadCompra != null ? $model->idModalidadCompra->modalidad : NULL,
			],
			'precio_compra',
			[
				'label'=>'Modalidad Venta',
				'value'=>$model->idModalidadVenta->modalidad,
			],
			'precio_venta',
            'fecha'
        ],
    ]) ?>
</div>