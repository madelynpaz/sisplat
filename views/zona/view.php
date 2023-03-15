<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zona */

$this->title = $model->zona;
$this->params['breadcrumbs'][] = ['label' => 'Zonas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zona-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_zona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id_zona], [
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
//            'id_zona',
            'zona',
        ],
    ]) ?>
</div>