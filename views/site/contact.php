<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row">
        <div class="col-lg-10">
            
            <img alt="GMAIL" width="90px" src="<?= Yii::$app->request->baseUrl."/images/imagen-gmail.jpg" ?>">
            <a target="_blank" href="https://mail.google.com/" title="Correo gmail Platano en línea">GMAIL (sistemaplatanoenlinea@gmail.com)</a>
            <br><br>
            
            <img alt="FACEBOOK" width="90px" src="<?= Yii::$app->request->baseUrl."/images/imagen-facebook.png" ?>">
            <a target="_blank" href="https://www.facebook.com/" title="Facebook Platano en línea">FACEBOOK (Platano EnLinea)</a>
            <br><br>
            
            <img alt="TWITTER" width="90px" src="<?= Yii::$app->request->baseUrl."/images/images.png" ?>">
            <a target="_blank" href="https://twitter.com/?lang=es" title="Facebook Platano en línea">TWITTER (@plátanoenlínea)</a>
            <br><br>
            
        </div>
    </div>
</div>

