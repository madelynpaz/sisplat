<?php

use yii\helpers\Html;
use app\models\Zona;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$this->title = 'Registrar Datos';
$this->params['breadcrumbs'][] = ['label' => 'Datos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
		'zona'=>new Zona,
    ]) ?>
</div>