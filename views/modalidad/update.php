<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modalidad */

$this->title = 'Actualizar Modalidad: ' . ' ' . $model->modalidad;
$this->params['breadcrumbs'][] = ['label' => 'Modalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->modalidad, 'url' => ['view', 'id' => $model->id_modalidad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="modalidad-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>