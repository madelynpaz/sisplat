<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agente */

$this->title = $model->agente;
$this->params['breadcrumbs'][] = ['label' => 'Agentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agente-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_agente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_agente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma que desea borrar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'agente',
            'idZona.zona',
        ],
    ]) ?>

</div>
