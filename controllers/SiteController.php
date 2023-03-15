<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Usuario;
use app\models\ContactForm;

/**
 * Controlador principal
 */
class SiteController extends Controller {

	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * 
	 * @return type
	 */
	public function actionIndex() {
		return $this->render('index');
	}

	/**
	 * 
	 * @return type
	 */
	public function actionLogin() {
		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			$modelUsuario = Usuario::findOne(Yii::$app->user->identity->id_usuario);
			$modelUsuario->save();
			return $this->goBack();
		} else {
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	/**
	 * 
	 * @return type
	 */
	public function actionLogout() {
		Yii::$app->user->logout();
		return $this->goHome();
	}

	/**
	 * 
	 * @return type
	 */
	public function actionContact() {
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		} else {
			return $this->render('contact', [
						'model' => $model,
			]);
		}
	}

	/**
	 * 
	 * @return type
	 */
	public function actionDocuments() {
		return $this->render('documents');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionManejoAgronomicoParteA(){
		return $this->render('documents_parte_a');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionManejoAgronomicoParteB(){
		return $this->render('documents_parte_b');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionManejoAgronomicoParteC(){
		return $this->render('documents_parte_c');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionManejoDensidad(){
		return $this->render('documents_densidad');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionManejoSanitario(){
		return $this->render('documents_sanitario');
	}
	
	/**
	 * 
	 * @return type
	 */
	public function actionLinks() {
		return $this->render('links');
	}
        
        
        
        	/**
	 * 
	 * @return type
	 */
	public function actionItems2() {
		return $this->render('items2');
	}
        
	
	/**
	 * 
	 * @return type
	 */
	public function actionAbout() {
		return $this->render('about');
	}
}