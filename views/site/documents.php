<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Requerimientos de información';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
	<div id="doc">
		<div style="margin-left: 10px">
			<img alt="directorio" width="50px" src="<?= Yii::$app->request->baseUrl."/images/folder_icon.png" ?>">
			<a href="<?= Url::to(['site/manejo-agronomico-parte-a']); ?>" title="Manejo Agronomico">Manejo Agronomico</a>
			<br>                        
			<img alt="directorio" width="50px" src="<?= Yii::$app->request->baseUrl."/images/folder_icon.png" ?>">
			<a href="<?= Url::to(['site/manejo-densidad']); ?>" title="Manejo densidades">Manejo de densidades</a>
			<br>
			<img alt="directorio" width="50px" src="<?= Yii::$app->request->baseUrl."/images/folder_icon.png" ?>">
			<a href="<?= Url::to(['site/manejo-sanitario']); ?>" title="Manejo sanitario">Manejo sanitario</a>
		</div>
	</div>
</div>