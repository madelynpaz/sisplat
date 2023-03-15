<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zonas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zona-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Crear Zona', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'zona',
//			[
//				'label'=>'Pesada',
//				'value'=>'historialZonaActual.pesada'
//			],
//			[
//				'label'=>'Cesta',
//				'value'=>'historialZonaActual.cesta'
//			],
//			[
//				'label'=>'Bolsa 5',
//				'value'=>'historialZonaActual.bolsa5'
//			],
//			[
//				'label'=>'Bolsa 10',
//				'value'=>'historialZonaActual.bolsa10'
//			],
//			[
//				'label'=>'Unidad',
//				'value'=>'historialZonaActual.unidad'
//			],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
