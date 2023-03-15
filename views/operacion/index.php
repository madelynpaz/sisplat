<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Registrar Datos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'header'=>'Zona',
				'value'=>'idAgente.idZona.zona'
			],
			[
				'header'=>'Agente',
				'value'=>'idAgente.agente'
			],
			[
				'header'=>'Modalidad',
				'value'=>'idModalidadCompra.modalidad'
			],
            'precio_compra',
			[
				'header'=>'Modalidad',
				'value'=>'idModalidadVenta.modalidad'
			],
            'precio_venta',
			'fecha',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
