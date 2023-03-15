<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModalidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modalidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modalidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a('Crear Modalidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
//			'id_modalidad',
			'modalidad',
			['class' => 'yii\grid\ActionColumn'],
		],
	]);
	?>

</div>
