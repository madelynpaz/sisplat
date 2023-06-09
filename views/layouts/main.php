<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img(Yii::$app->request->baseUrl."/images/logo.png", 
					['alt'=>Yii::$app->name, 'width'=>'200px']),//'SisPlat',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
				'brandOptions'=>[
					'style'=> 'padding-top:0px'
				]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
					['label' => 'Documentación', 'url' => ['/site/documents'], 'visible'=>Yii::$app->user->isGuest],
					['label' => 'Estadistica', 'url' => ['/operacion/estadistica'], 'visible'=>Yii::$app->user->isGuest],
					['label' => 'Enlaces', 'url' => ['/site/links'], 'visible'=>Yii::$app->user->isGuest],
                    
                                        ['label' => 'Items', 'url' => ['/site/items2'], 'visible'=>Yii::$app->user->isGuest],
                    
					['label' => 'Agente', 'url' => ['/agente/index'], 'visible'=>!Yii::$app->user->isGuest],
					['label' => 'Datos', 'url' => ['/operacion/index'], 'visible'=>!Yii::$app->user->isGuest],
					['label' => 'Modalidad', 'url' => ['/modalidad/index'], 'visible'=>!Yii::$app->user->isGuest],
					['label' => 'Zona', 'url' => ['/zona/index'], 'visible'=>!Yii::$app->user->isGuest],
                    ['label' => 'Contacto', 'url' => ['/site/contact'], 'visible'=>Yii::$app->user->isGuest],
					['label' => 'Acerca de', 'url' => ['/site/about'], 'visible'=>Yii::$app->user->isGuest],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
						],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Univ. del Zulia. Factultad de Agronomía <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
