<?php

/**
 * This is the model class for table "worker".
 *
 * The followings are the available columns in table 'admins':
 * @property integer $id
 * @property string $login
 * @property string $email
 * @property string $fio
 * @property string $password
 * @property integer $role
 */
class Worker extends EActiveRecord
{
	public $confirmPassword;
	
	public function getSoult($password)
	{
		return md5($password.md5($password));
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vshttorg.worker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, login, fio', 'required'),
			array('email', 'length', 'max'=>100),
			array('email', 'email'),
			array('email', 'unique', 'className' => 'Worker', 'attributeName' => 'email', 'caseSensitive' => true),
			array('login', 'unique', 'className' => 'Worker', 'attributeName' => 'login', 'caseSensitive' => true),
			array('fio', 'length', 'max'=>45),
			array('login', 'length', 'max'=>32),
			array('lastVisit', 'safe'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t('main','Confirm Password Validate Error'),),
			array('password', 'compare', 'compareAttribute'=>'confirmPassword', 'message' => Yii::t('main','Confirm Password Validate Error'),),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, password, loginm, fio', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders'=>array(self::HAS_MANY, 'Orders', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main','ID'),
			'email' => Yii::t('main','Email'),
			'password' => Yii::t('main','Password'),
			'confirmPassword' => Yii::t('main','Confirm Password'),
			'fio' => Yii::t('main','FIO'),
			'login' => Yii::t('main','Login'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('fio',$this->fio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admins the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
