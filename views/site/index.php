<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Carousel;

$this->title = 'Sistema de Información Virtual del Platano';
?>
<div class="site-index">
    <div class="jumbotron" style="padding-bottom: 0px">
        <h2>Bienvenido a Platano en linea!</h2>
        <p class="lead">Sistema de Información Virtual del Planato en el Estado Zulia.</p>
    </div>

    <div class="body-content">
        <div class="row">
			<div class="col-lg-1"></div>
            <div class="col-lg-10">
                <!--<h2>Heading</h2>-->
				<?php
				$images = [
					'<img src="'.Html::img('images/IMG_20150630_082334994.jpeg', ['alt'=>'some', 'class'=>'thing']).'"/>'
				];
				echo Carousel::widget([
					'items' => [
						Html::img(Yii::$app->request->baseUrl."/images/platano03.jpg"),
						Html::img(Yii::$app->request->baseUrl."/images/platano01.jpg"),
						Html::img(Yii::$app->request->baseUrl."/images/platano02.jpg"),
					],
					'options'=>[
						'width'=>'auto',
					]
				]);
				?>
                <p style="text-align: center;">Somos un enlace a los agentes de comercialización del plátano, 
					donde usted puede obtener información oportuna, verás y actualizada 
					del acontecer del plátano en el estado Zulia.</p>

                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>
			<div class="col-lg-1"></div>
<!--            <div class="col-lg-4">
                <h2>Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>-->
        </div>
    </div>
</div>
