<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property integer $id_persona
 * @property integer $id_tipo_usuario
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password
 * @property string $ultimo_acceso
 * @property integer $id_estado_usuario
 */
class Usuario extends ActiveRecord implements IdentityInterface {

	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'usuario';
	}

	public function behaviors() {
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id_persona', 'id_tipo_usuario', 'created_at', 'updated_at', 'id_estado_usuario'], 'integer'],
			[['username', 'email', 'password', 'ultimo_acceso'], 'required'],
			[['ultimo_acceso'], 'safe'],
			[['username'], 'string', 'max' => 15],
			[['password_hash', 'password_reset_token'], 'string', 'max' => 60],
			[['auth_key'], 'string', 'max' => 32],
			[['email'], 'string', 'max' => 100],
			[['password'], 'string', 'max' => 20],
			[['username'], 'unique']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id_usuario' => 'ID Usuario',
			'id_persona' => 'Persona',
			'id_tipo_usuario' => 'Tipo Usuario',
			'username' => 'Usuario',
			'password_hash' => 'Password Hash',
			'password_reset_token' => 'Password Reset Token',
			'auth_key' => 'Auth Key',
			'email' => 'Email',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'password' => 'Password',
			'ultimo_acceso' => 'Ultimo Acceso',
			'id_estado_usuario' => 'Estado Usuario',
		];
	}

	/**
	 * Finds an identity by the given ID.
	 *
	 * @param string|integer $id the ID to be looked for
	 * @return IdentityInterface|null the identity object that matches the given ID.
	 */
	public static function findIdentity($id) {
		return static::findOne(['id_usuario' => $id]);
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username) {
		$dbUser = Usuario::find()
				->where([
					"lower(username)" => $username,
//					"id_tipo_usuario" => 1,
				])
				->one();

		if (!count($dbUser)) {
			return null;
		}
		return new static($dbUser);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token) {
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}

		return static::findOne([
					'password_reset_token' => $token,
					'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds an identity by the given token.
	 *
	 * @param string $token the token to be looked for
	 * @return IdentityInterface|null the identity object that matches the given token.
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		return static::findOne(['access_token' => $token]);
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 * @return boolean
	 */
	public static function isPasswordResetTokenValid($token) {
		if (empty($token)) {
			return false;
		}
		$expire = Yii::$app->params['user.passwordResetTokenExpire'];
		$parts = explode('_', $token);
		$timestamp = (int) end($parts);
		return $timestamp + $expire >= time();
	}

	/**
	 * @return int current user ID
	 */
	public function getId() {
		return $this->getPrimaryKey();
	}

	/**
	 * @return string current user auth key
	 */
	public function getAuthKey() {
		return $this->auth_key;
	}

	/**
	 * @param string $authKey
	 * @return boolean if auth key is valid for current user
	 */
	public function validateAuthKey($authKey) {
		return $this->getAuthKey() === $authKey;
	}

	public function beforeSave($insert) {
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = \Yii::$app->security->generateRandomString();
			}
			return true;
		}
		return false;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password) {
		return Yii::$app->security->validatePassword($password, $this->password_hash);
		//return $this->password === $password;
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey() {
		$this->auth_key = Yii::$app->security->generateRandomString();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken() {
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken() {
		$this->password_reset_token = null;
	}

	/**
	 * Obtiene la lista de usuarios
	 * @return type
	 */
	public static function getUsuarios() {
		$data = static::find()->all();
		$value = (count($data) == 0) ? ['' => ''] : \yii\helpers\ArrayHelper::map($data, 'id_usuario', 'username');

		return $value;
	}
}