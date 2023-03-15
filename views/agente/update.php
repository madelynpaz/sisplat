<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agente */

$this->title = 'Actualizar Agente: ' . ' ' . $model->agente;
$this->params['breadcrumbs'][] = ['label' => 'Agentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->agente, 'url' => ['view', 'id' => $model->id_agente]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="agente-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>